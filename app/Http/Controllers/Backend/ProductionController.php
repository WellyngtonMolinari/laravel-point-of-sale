<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production;
use Intervention\Image\Facades\Image;
use Carbon\Carbon; 

class ProductionController extends Controller
{
   public function AllProduction(){

    $production = Production::latest()->get();
    return view('backend.production.all_production',compact('production'));

   } // End Method 





}