<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Category;
use App\Models\Customer;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Exports\ProductionExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ProductionController extends Controller
{
    public function AllProduction(){

        $production = Production::latest()->get();
        return view('backend.production.all_production',compact('production'));

    } // End Method 

    public function AddProduction(){

        $category = Category::latest()->get();
        $customer = Customer::latest()->get();

        return view('backend.production.add_production',compact('category','customer'));

    } // End Method

    public function StoreProduction(Request $request){ 
        
        $image = $request->file('production_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/production/'.$name_gen);
        $save_url = 'upload/production/'.$name_gen;

        Production::insert([

            'production_name' => $request->production_name,
            'category_id' => $request->category_id,
            'customer_id' => $request->customer_id,
            'production_store' => $request->production_store,
            'deadline_date' => $request->deadline_date,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'profit_price' => $request->profit_price,
            'profit_quantity' => $request->profit_quantity,
            'production_status' => $request->production_status,
            'production_image' => $save_url,
            'created_at' => Carbon::now(), 

        ]);

        $notification = array(
            'message' => 'Produção Criada Com Sucesso!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.production')->with($notification); 
    } // End Method 


    public function EditProduction($id){

        $production = Production::findOrFail($id);
        $category = Category::latest()->get();
        $customer = Customer::latest()->get();

        return view('backend.production.edit_production',compact('production','category','customer'));
    } // End Method


    public function UpdateProduction(Request $request)
    {
        $production_id = $request->id;
        $user = Auth::user(); // Get the authenticated user

        // Retrieve the production record to be updated
        $production = Production::findOrFail($production_id);

        // Update the fields that all users can update
        $production->production_name = $request->production_name;
        $production->category_id = $request->category_id;
        $production->customer_id = $request->customer_id;
        $production->production_store = $request->production_store;
        $production->deadline_date = $request->deadline_date;
        $production->production_status = $request->production_status;

        // Check if the user has the necessary permission to update specific fields
        if ($user->can('pos.menu')) {
            // Update the fields that require 'pos.menu' permission
            $production->cost_price = $request->cost_price;
            $production->selling_price = $request->selling_price;
            $production->profit_price = $request->profit_price;
            $production->profit_quantity = $request->profit_quantity;
        }

        // Check if the image is uploaded and update the image field if necessary
        if ($request->hasFile('production_image')) {
            // Handle the uploaded image and save it to the appropriate location
            $image = $request->file('production_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('upload/production/', $name_gen);
            $save_url = 'upload/production/' . $name_gen;
            $production->production_image = $save_url;
        }

        // Save the changes to the database
        $production->save();

        $notification = array(
            'message' => 'Production Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.production')->with($notification);
    }


    public function DeleteProduction($id){

        $production_img = Production::findOrFail($id);
        $img = $production_img->production_image;
        unlink($img);

        Production::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Production Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method

    public function Export(){

        return Excel::download(new ProductionExport,'productions.xlsx');

    }// End Method 

    public function DetailsProduction($id){

        $production = Production::findOrFail($id);
        return view('backend.production.details_production',compact('production'));

    } // End Method 

}