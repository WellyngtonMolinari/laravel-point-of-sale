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



}