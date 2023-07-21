<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvanceSalary; 
use App\Models\Employee;
use App\Models\PaySalary;
use Carbon\Carbon;

class SalaryController extends Controller
{
    public function AddAdvanceSalary(){

        $employee = Employee::latest()->get();
        return view('backend.salary.add_advance_salary',compact('employee'));

    }// End Method 


    public function AdvanceSalaryStore(Request $request){

        $validateData = $request->validate([
            'month' => 'required',
            'year' => 'required',
        ]);

        $month = $request->month;
        $employee_id = $request->employee_id;

        $advanced = AdvanceSalary::where('month',$month)->where('employee_id',$employee_id)->first();

        if ($advanced === NULL) {

            AdvanceSalary::insert([
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'year' => $request->year,
                'advance_salary' => $request->advance_salary,
                'created_at' => Carbon::now(), 
            ]);

         $notification = array(
            'message' => 'Advance Salary Paid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.advance.salary')->with($notification); 


        } else{

             $notification = array(
            'message' => 'Advance Already Paid',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification); 

        }

    }// End Method 

    public function AllAdvanceSalary(){

        $salary = AdvanceSalary::latest()->get();
        return view('backend.salary.all_advance_salary',compact('salary'));

    }// End Method 

    public function EditAdvanceSalary($id){
        $employee = Employee::latest()->get();
        $salary = AdvanceSalary::findOrFail($id);
        return view('backend.salary.edit_advance_salary',compact('salary','employee'));

    }// End Method 


    public function AdvanceSalaryUpdate(Request $request){

        $salary_id = $request->id;

         AdvanceSalary::findOrFail($salary_id)->update([
                'employee_id' => $request->employee_id,
                'month' => $request->month,
                'year' => $request->year,
                'advance_salary' => $request->advance_salary,
                'created_at' => Carbon::now(), 
            ]);

         $notification = array(
            'message' => 'Advance Salary Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.advance.salary')->with($notification); 


    }// End Method 


    public function DeleteAdvanceSalary($id){

        AdvanceSalary::findOrFail($id)->delete();

        $notification = array(
            'message' => 'AdvanceSalary Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 

    // PAY SALARY METHOD //
    public function PaySalary(){

        $employee = Employee::latest()->get();
        return view('backend.salary.pay_salary',compact('employee'));
    }// End Method 

    public function PayNowSalary($id){

        $paysalary = Employee::findOrFail($id);
        return view('backend.salary.paid_salary',compact('paysalary'));

    }// End Method 


    public function EmployeSalaryStore(Request $request){

        $employee_id = $request->id;

        PaySalary::insert([

            'employee_id' => $employee_id,
            'salary_month' => $request->month,
            'paid_amount' => $request->paid_amount,
            'advance_salary' => $request->advance_salary,
            'due_salary' => $request->due_salary,
            'created_at' => Carbon::now(),

        ]);

       $notification = array(
            'message' => 'Employee Salary Paid Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('pay.salary')->with($notification); 


    }// End Method 

    public function MonthSalary(){

        $paidsalary = PaySalary::latest()->get();
        return view('backend.salary.month_salary',compact('paidsalary'));

    }// End Method 

    public function HistorySalary($id)
{
    // Fetch the salary history for the specified employee ID
    $historysalary = PaySalary::where('employee_id', $id)->get();

    // Make sure the employee exists and there is salary history data
    if (!$historysalary->isEmpty()) {
        return view('backend.salary.history_salary', compact('historysalary'));
    } else {
        // Redirect or display an error message if no history found
        return redirect()->route('pay.salary')->with('error', 'No salary history found for this employee.');
    }
}

}
