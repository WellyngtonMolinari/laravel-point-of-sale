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

}