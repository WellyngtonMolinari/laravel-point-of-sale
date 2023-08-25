<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yarn;
use Intervention\Image\Facades\Image;
use Carbon\Carbon; 
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Production;
use Illuminate\Support\Facades\File;


class YarnController extends Controller
{
    public function AllYarn(){

    $yarn = Yarn::latest()->get();
    return view('backend.yarn.all_yarn',compact('yarn'));

    } // End Method 
    
    
    
    public function AddYarn(){

    $category = Category::latest()->get();
    $supplier = Supplier::latest()->get();
    $production = Production::latest()->get();
    return view('backend.yarn.add_yarn',compact('category','supplier','production'));
    }// End Method 
    
    
    public function StoreYarn(Request $request){ 

    $image = $request->file('yarn_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/yarn/'.$name_gen);
    $save_url = 'upload/yarn/'.$name_gen;

    Yarn::insert([

        'yarn_name' => $request->yarn_name,
        'category_id' => $request->category_id,
        'supplier_id' => $request->supplier_id,
        'yarn_totalweight' => $request->yarn_totalweight,
        'yarn_totalqtty' => $request->yarn_totalqtty,
        'yarn_weightpunt' => $request->yarn_weightpunt,
        'yarn_color' => $request->yarn_color,
        'yarn_image' => $request->yarn_image,
        'yarn_garage' => $request->yarn_garage,
        'production_id' => $request->production_id,
        'production_estimate' => $request->production_estimate,
        'buying_date' => $request->buying_date,
        'buying_price' => $request->buying_price,
        'created_at' => Carbon::now(), 

    ]);

        $notification = array(
        'message' => 'Fio adicionado com Sucesso',
        'alert-type' => 'success'
    );

    return redirect()->route('all.yarn')->with($notification); 
    } // End Method 


    public function EditYarn($id){
        $yarn = Yarn::findOrFail($id);
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $production = Production::latest()->get();
        return view('backend.yarn.edit_yarn',compact('yarn','category','supplier','production'));

    } // End Method 



    public function UpdateYarn(Request $request)
    {
        $yarn_id = $request->id;
        $yarn = Yarn::findOrFail($yarn_id);
    
        if ($request->file('yarn_image')) {
            $image = $request->file('yarn_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/yarn/' . $name_gen);
            $save_url = 'upload/yarn/' . $name_gen;
    
            // Delete the old image if it exists
            if (File::exists(public_path($yarn->yarn_image))) {
                File::delete(public_path($yarn->yarn_image));
            }
    
            $yarn->update([
                'yarn_name' => $request->yarn_name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'yarn_totalweight' => $request->yarn_totalweight,
                'yarn_totalqtty' => $request->yarn_totalqtty,
                'yarn_weightpunt' => $request->yarn_weightpunt,
                'yarn_color' => $request->yarn_color,
                'yarn_image' => $request->yarn_image,
                'yarn_garage' => $request->yarn_garage,
                'production_id' => $request->production_id,
                'production_estimate' => $request->production_estimate,
                'buying_date' => $request->buying_date,
                'buying_price' => $request->buying_price,
                'created_at' => Carbon::now(), 
            ]);
        } else {
            $yarn->update([
                'yarn_name' => $request->yarn_name,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'yarn_totalweight' => $request->yarn_totalweight,
                'yarn_totalqtty' => $request->yarn_totalqtty,
                'yarn_weightpunt' => $request->yarn_weightpunt,
                'yarn_color' => $request->yarn_color,
                'yarn_garage' => $request->yarn_garage,
                'production_id' => $request->production_id,
                'production_estimate' => $request->production_estimate,
                'buying_date' => $request->buying_date,
                'buying_price' => $request->buying_price,
                'created_at' => Carbon::now(), 
            ]);
        }
    
        $notification = array(
            'message' => 'Fio Atualizado com Sucesso',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.yarn')->with($notification);
    }
    
    public function DeleteYarn($id){

        $yarn_img = Yarn::findOrFail($id);
        $img = $yarn_img->yarn_image;
        unlink($img);

        Yarn::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Fio Deletado com Sucesso',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification); 

    } // End Method 
}
