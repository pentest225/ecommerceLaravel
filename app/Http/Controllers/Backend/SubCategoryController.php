<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $subcategories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_fr','ASC')->get();
        return view('backend.subcategory.sub_category_view',compact('subcategories','categories'));
    }

   
    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'sub_category_name_fr'=>'required',
            'sub_category_name_en'=>'required',
        ]);

        SubCategory::insert([
            'category_id'=>$request->category_id,
            'sub_category_name_fr'=>$request->sub_category_name_fr,
            'sub_category_name_en'=>$request->sub_category_name_en,
            'sub_category_slug_fr'=>strtolower(str_replace(' ','-',$request->sub_category_name_fr)),
            'sub_category_slug_en'=>strtolower(str_replace(' ','-',$request->sub_category_name_en)),
        ]);

        $notification = array(
            "message"=>"SubCategory added succefully",
            "alert-type"=>"success"
        );
        return redirect()->back()->with($notification);

    }

    
    public function subCategoryEdit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_fr','ASC')->get();

        return view('backend.subcategory.sub_category_edit',compact('subcategory','categories'));
    }

    
    public function subCategoryUpdate(Request $request)
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

   
    public function subCategoryDelate($id)
    {
      
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            "message"=>"SubCategorie deleted succefully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);
    }

}
