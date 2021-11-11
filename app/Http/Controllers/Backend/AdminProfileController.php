<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        $adminData = Admin::find(2);
        
        return view('admin.admin_profile',compact('adminData'));
    }
    public function adminProfileEdit(){
        $editingData = Admin::find(2);
        return view('admin.admin_profile_edit',compact('editingData'));
    }
    public function adminProfileStore(Request $request){
        $data = Admin::find(2);
        $data->email = $request->email;
        $data->name = $request->name;
        if($request->file('admin_image')){
            $file = $request->file('admin_image');
            @unlink('uplaod/admin_images/'.$data['profile_photo_path']);
            $fileName = date('YmdHi').$file->getClientOriginalName();

            $file->move('uplaod/admin_images',$fileName);
            $data['profile_photo_path'] = $fileName;

        }
        $data->save();
        $notification = array(
            "message"=>"Admin profil update succefully",
            "alert-type"=>"success"
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
