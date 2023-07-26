<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function AllCustomer()
    {
        $customer = Customer::latest()->get();

        return view('backend.customer.all_customer',compact('customer'));
    }

    public function AddCustomer(){
        return view('backend.customer.add_customer');
   } // End Method 


   public function StoreCustomer(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required|max:200',
           'email' => 'required|unique:customers|max:200',
           'phone' => 'required|max:200',
           'address' => 'required|max:400',
           'shopname' => 'required|max:200',
           'account_holder' => 'required|max:200',
           'account_number' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Remove 'required'
       ]);
   
       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
   
       $save_url = null;
   
       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
           Image::make($image)->resize(300, 300)->save('upload/customer/' . $name_gen);
           $save_url = 'upload/customer/' . $name_gen;
       }
   
       Customer::create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'address' => $request->address,
           'shopname' => $request->shopname,
           'account_holder' => $request->account_holder,
           'account_number' => $request->account_number,
           'bank_name' => $request->bank_name,
           'bank_branch' => $request->bank_branch,
           'city' => $request->city,
           'image' => $save_url,
           'created_at' => Carbon::now(),
       ]);
   
       $notification = [
           'message' => 'Customer Inserted Successfully',
           'alert-type' => 'success',
       ];
   
       return redirect()->route('all.customer')->with($notification);
   }
   
   public function EditCustomer($id){

    $customer = Customer::findOrFail($id);
    return view('backend.customer.edit_customer',compact('customer'));

} // End Method 


 public function UpdateCustomer(Request $request){

    $customer_id = $request->id;

    if ($request->file('image')) {

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/customer/'.$name_gen);
    $save_url = 'upload/customer/'.$name_gen;

    Customer::findOrFail($customer_id)->update([

        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'shopname' => $request->shopname,
        'account_holder' => $request->account_holder,
        'account_number' => $request->account_number,
        'bank_name' => $request->bank_name,
        'bank_branch' => $request->bank_branch,
        'city' => $request->city,
        'image' => $save_url,
        'created_at' => Carbon::now(), 

    ]);

     $notification = array(
        'message' => 'Customer Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.customer')->with($notification); 

    } else{

        Customer::findOrFail($customer_id)->update([

        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'shopname' => $request->shopname,
        'account_holder' => $request->account_holder,
        'account_number' => $request->account_number,
        'bank_name' => $request->bank_name,
        'bank_branch' => $request->bank_branch,
        'city' => $request->city, 
        'created_at' => Carbon::now(), 

    ]);

     $notification = array(
        'message' => 'Customer Updated Successfully',
        'alert-type' => 'success'
    );

        return redirect()->route('all.customer')->with($notification); 

        } // End else Condition  


    } // End Method 


    public function DeleteCustomer($id){

        $customer_img = Customer::findOrFail($id);
        $img = $customer_img->image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
