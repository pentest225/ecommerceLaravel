<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function brandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }


    public function brandStore(Request $request){
        $request->validate([
            'brand_name_fr'=>'required',
            'brand_name_en'=>'required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand'.$name_gen);
        $save_url = 'upload/brand'.$name_gen;
        Brand::insert([
            'brand_name_fr'=>$request->brand_name_fr,
            'brand_name_en'=>$request->brand_name_en,
            'brand_slug_fr'=>strtolower(str_replace(' ','-',$request->brand_name_fr)),
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_image'=>$save_url
        ]);

        $notification = array(
            "message"=>"Brand added succefully",
            "alert-type"=>"success"
        );
        return redirect()->back()->with($notification);
   
    }
    public function brandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }
    public function brandUpdate(Request $request){
        
        //Validation des donnee 
        $request->validate([
            'brand_name_fr'=>'required',
            'brand_name_en'=>'required',
        ]);
        if ($request->file('brand_image')) {
            unlink($request->brand_old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand'.$name_gen);
            $save_url = 'upload/brand'.$name_gen;
            $this->updateBrand($request,$save_url);
        }else{
            $this->updateBrand($request,null);
        }
        $notification = array(
            "message"=>"Brand updated succefully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);
    }

    public function brandDelate($id){

        $brand = Brand::findOrFail($id);
        unlink($brand->brand_image);
        Brand::findOrFail($id)->delete();
        $notification = array(
            "message"=>"Brand deleted succefully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);
    }





/*
|--------------------------------------------------------------------------
| SAVE BRAN FUNCTION 
|--------------------------------------------------------------------------
*/
    private function updateBrand($request,?string $saveFile){
        return is_null($saveFile)? Brand::findOrFail($request->brand_id)->update([
            'brand_name_fr'=>$request->brand_name_fr,
            'brand_name_en'=>$request->brand_name_en,
            'brand_slug_fr'=>strtolower(str_replace(' ','-',$request->brand_name_fr)),
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            
        ]):Brand::findOrFail($request->brand_id)->update([
            'brand_name_fr'=>$request->brand_name_fr,
            'brand_name_en'=>$request->brand_name_en,
            'brand_slug_fr'=>strtolower(str_replace(' ','-',$request->brand_name_fr)),
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_image'=>$saveFile
        ]);
    }
}
