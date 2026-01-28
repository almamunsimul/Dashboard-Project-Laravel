<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RecycleController extends Controller
{
        public function all()
    {
        // // echo 'success'
        $bandata = Banner::where ('ban_status', 0)->orderBy('ban_id', 'DESC')->get();
        return view('admin.banner.recycle', compact('bandata'));
    }


        public function restore(Request $request){
        $id=$request['restore_id'];
        $restore= Banner:: where ('ban_status', 0)->where ('ban_slug', $id)->update(['ban_status'=> 1]);
        if($restore){
            return redirect()->route('banner.all')->with('success', 'Banner Restore Successfully!');
        }else{
            return redirect()->route('banner.all')->with('error', 'Banner Restore Failed! Please Try Again');
        }


    }

        public function delete(Request $request){
        $id=$request->modal_id;
        
        $imageInfo= Banner:: where ('ban_status', 0)->where ('ban_slug', $id)->firstOrFail();
        if($imageInfo->ban_image){
            $imagePath=public_path('uploads/banner/' . $imageInfo->ban_image);
            
            if
            (File::exists($imagePath)){
            File::delete($imagePath);
            }
        }



        // dd($imageInfo->ban_image);

        
        $delete= Banner:: where ('ban_status', 0)->where ('ban_slug', $id)->delete();

        if($delete){
            return redirect()->route('banner.recycle.all')->with('success', 'Banner Permanently Deleted Successfully!');
        }else{
            return redirect()->route('banner.recycle.all')->with('error', 'Banner Permanently Deleted Failed! Please Try Again');
        }}
}
