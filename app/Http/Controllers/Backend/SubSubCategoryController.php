<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;

class SubSubCategoryController extends Controller
{
    public function subSubCategoryView()
    {
        $subsubcategories = SubSubCategory::latest()->get();
        $categories = Category::orderBy('category_name_fr','ASC')->get();
        return view('backend.subsubcategory.sub_subcategory_view',compact('subsubcategories','categories'));
    }

   
    public function subSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'sub_subcategory_name_fr'=>'required',
            'sub_subcategory_name_en'=>'required',
        ]);

        SubSubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'sub_subcategory_name_fr'=>$request->sub_subcategory_name_fr,
            'sub_subcategory_name_en'=>$request->sub_subcategory_name_en,
            'sub_subcategory_slug_fr'=>strtolower(str_replace(' ','-',$request->sub_subcategory_name_fr)),
            'sub_subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->sub_subcategory_name_en)),
        ]);

        $notification = array(
            "message"=>"SubSubCategory added succefully",
            "alert-type"=>"success"
        );
        return redirect()->back()->with($notification);

    }

    
    public function subSubCategoryEdit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_fr','ASC')->get();

        return view('backend.subcategory.sub_category_edit',compact('subcategory','categories'));
    }

    
    public function subSubCategoryUpdate(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'sub_category_name_fr'=>'required',
            'sub_category_name_en'=>'required',
        ]);

        SubCategory::findOrFail($request->sub_category_id)->update([
            'sub_category_name_fr'=>$request->sub_category_name_fr,
            'sub_category_name_en'=>$request->sub_category_name_en,
            'sub_category_slug_fr'=>strtolower(str_replace(' ','-',$request->category_name_fr)),
            'sub_category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
        ]);


        $notification = array(
            "message"=>"SubCategory update succefully",
            "alert-type"=>"success"
        );
        return redirect()->route('sub.category.all')->with($notification);
    }

   
    public function subSubCategoryDelate($id)
    {
      
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            "message"=>"SubCategorie deleted succefully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);
    }


    public function getSubCategoryByCategoryId($categoryId){
        $subCatList = SubCategory::where('category_id',$categoryId)->get();
        return json_encode($subCatList);
    }
}
