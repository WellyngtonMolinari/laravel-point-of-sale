<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Category;
use App\Models\Customer;
use Intervention\Image\Facades\Image;
use Carbon\Carbon; 

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


    public function UpdateProduction(Request $request){

        $production_id = $request->id;

        if ($request->file('production_image')) {

        $image = $request->file('production_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/production/'.$name_gen);
        $save_url = 'upload/production/'.$name_gen;

        Production::findOrFail($production_id)->update([

            'production_name' => $request->production_name,
            'category_id' => $request->category_id,
            'customer_id' => $request->customer_id,
            'production_store' => $request->production_store,
            'deadline_date' => $request->deadline_date,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'profit_price' => $request->profit_price,
            'profit_quantity' => $request->profit_quantity,
            'production_image' => $save_url,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'production Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.production')->with($notification); 

        } else{

        Production::findOrFail($production_id)->update([

            'production_name' => $request->production_name,
            'category_id' => $request->category_id,
            'customer_id' => $request->customer_id,
            'production_store' => $request->production_store,
            'deadline_date' => $request->deadline_date,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'profit_price' => $request->profit_price,
            'profit_quantity' => $request->profit_quantity,
            'created_at' => Carbon::now(), 

        ]);

            $notification = array(
            'message' => 'production Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.production')->with($notification); 

        } // End else Condition  


    } // End Method 

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

}