<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function categoryView()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view',compact('categories'));
    }

   
    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name_fr'=>'required',
            'category_name_en'=>'required',
            'category_icon'=>'required'
        ]);

        Category::insert([
            'category_name_fr'=>$request->category_name_fr,
            'category_name_en'=>$request->category_name_en,
            'category_icon'=>$request->category_icon,
            'category_slug_fr'=>strtolower(str_replace(' ','-',$request->category_name_fr)),
            'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
        ]);

        $notification = array(
            "message"=>"Category added succefully",
            "alert-type"=>"success"
        );
        return redirect()->back()->with($notification);

    }

    
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    
    public function categoryUpdate(Request $request)
    {
        $request->validate([
            'category_name_fr'=>'required',
            'category_name_en'=>'required',
            'category_icon'=>'required'
        ]);

        Category::findOrFail($request->category_id)->update([
            'category_name_fr'=>$request->category_name_fr,
            'category_name_en'=>$request->category_name_en,
            'category_icon'=>$request->category_icon,
            'category_slug_fr'=>strtolower(str_replace(' ','-',$request->category_name_fr)),
            'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
        ]);


        $notification = array(
            "message"=>"Category update succefully",
            "alert-type"=>"success"
        );
        return redirect()->route('category.all')->with($notification);
    }

   
    public function categoryDelate($id)
    {
      
        Category::findOrFail($id)->delete();
        $notification = array(
            "message"=>"Categorie deleted succefully",
            "alert-type"=>"info"
        );
        return redirect()->back()->with($notification);
    }

    
}
