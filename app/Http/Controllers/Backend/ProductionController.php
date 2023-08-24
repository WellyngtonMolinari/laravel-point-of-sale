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
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\FinishedProduction;

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
            'production_weight' => $request->production_weight,
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
        $production->production_weight = $request->production_weight;
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
            'message' => 'Production Atualizada com Sucesso',
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
            'message' => 'Produção Deletada com Sucesso',
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

    public function addProductionToStock($productionId)
    {
        $production = Production::findOrFail($productionId);

        // Assuming the necessary fields for the new product in the stock are available in the $production object.
        // Adjust the field names accordingly if needed.

        $newProduct = new Product();
        $newProduct->product_name = $production->production_name;
        $newProduct->category_id = $production->category_id;
        $newProduct->selling_price = $production->selling_price;
        $newProduct->product_store = $production->production_store; // Set the product_store with the production_store value
        $newProduct->product_weight = $production->production_weight; // Set the product_store with the production_store value
        $newProduct->product_image = $production->production_image; // Correctly map the image field

        // Set the supplier ID, if available, otherwise use a default value
        $newProduct->supplier_id = $production->supplier_id ?? 1; // 1 represents the default supplier ID

        // Save the new product in the stock.
        $newProduct->save();

        
        // Move the finished production to the 'finished_productions' table
        DB::table('finished_productions')->insert([
            'production_name' => $production->production_name,
            'category_id' => $production->category_id,
            'customer_id' => $production->customer_id,
            'production_image' => $production->production_image,
            'production_store' => $production->production_store,
            'production_weight' => $production->production_weight,
            'deadline_date' => $production->deadline_date,
            'cost_price' => $production->cost_price,
            'selling_price' => $production->selling_price,
            'profit_price' => $production->profit_price,
            'profit_quantity' => $production->profit_quantity,
            'production_status' => $production->production_status,
            'created_at' => $production->created_at,
            'updated_at' => $production->updated_at,
        ]);

        // Remove the finished production from the 'productions' table
        $production->delete();

        $notification = array(
            'message' => 'Produção Adicionada ao Estoque!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.production')->with($notification);
 
    }

    public function HistoryProduction()
    {
        $finishedProduction = FinishedProduction::all();

        return view('backend.production.history_production', compact('finishedProduction'));
    }

} 