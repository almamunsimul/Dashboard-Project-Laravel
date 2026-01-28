<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BannerExport;
use App\Http\Controllers\Controller;
use App\Imports\BannerImport;
use Illuminate\Http\Request;
use App\Models\Banner;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class BannerController extends Controller
{
    public function all()
    {
        // // echo 'success'
        $bandata = Banner::where ('ban_status', 1)->orderBy('ban_id', 'DESC')->get();
        return view('admin.banner.all', compact('bandata'));
    }

    public function add()
    {
        return view('admin.banner.add');
    }

    public function view($ban_slug)
    {
        $data=Banner::where ('ban_slug', $ban_slug)->firstOrFail();
        return view('admin.banner.view',compact('data'));
    }

    public function edit($ban_slug)
    {
        $data=Banner::where ('ban_slug', $ban_slug)->firstOrFail();
        return view('admin.banner.edit',compact('data'));
    }

    public function insert(Request $request)
    {
        $ban_creator = Auth::user()->id;
        $ban_slug = uniqid(2026)."_".uniqid(1258);

        $insert = Banner::insertGetId([
            'ban_title' => $request['title'],
            'ban_subtitle' => $request['subtitle'],
            'ban_btn' => $request['button'],
            'ban_url' => $request['url'],
            'ban_creator' => $ban_creator,
            'ban_slug' => $ban_slug,
            'created_at' => Carbon::now(),
        ]);

        if($request -> hasFile('image')){
            $image = $request -> file('image');
            $imageName = "Banner_".time()."_".rand(1000000,9999999).".".$image->getClientOriginalExtension();
            
            Image::read($image)->save('uploads/banner/'.$imageName);

            Banner:: where ('ban_id', $insert)->update([
                'ban_image'=>$imageName
            ]);
        }

        // if ($request->hasFile('image')) {
        // $image = $request->file('image');
        // $imageName = 'Banner_' . time() . '_' . rand(1000000,9999999) . '.' . $image->getClientOriginalExtension();
        // Image::read($image)->save(public_path('uploads/banner/' . $imageName));}

        if ($insert) {
            return redirect()->route('banner.all')->with('success', 'Banner Added Successfully!');
        } else {
            return redirect()->route('banner.add')->with('error', 'Banner Added Failed! Please Try Again');
        }
    }


    public function update(Request $request)
    {
        $ban_slug=$request['ban_slug'];
        $ban_editor = Auth::user()->id;

        
        // 🔹 Banner info আনো (old image জানার জন্য)
        $banner = Banner::where('ban_slug', $ban_slug)->firstOrFail();

        $update = Banner:: where ('ban_slug', $ban_slug)->update([
            'ban_title' => $request['title'],
            'ban_subtitle' => $request['subtitle'],
            'ban_btn' => $request['button'],
            'ban_url' => $request['url'],
            'ban_editor' => $ban_editor,
            'updated_at' => Carbon::now(),
        ]);

        if($request -> hasFile('image')){


            /* ---------- OLD IMAGE DELETE ---------- */
            if (!empty($banner->ban_image)) {
                $oldImagePath = public_path('uploads/banner/' . $banner->ban_image);

                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            /* ---------- NEW IMAGE SAVE ---------- */
            $image = $request -> file('image');
            $imageName = "Banner_".time()."_".rand(1000000,9999999).".".$image->getClientOriginalExtension();
            
            Image::read($image)->save('uploads/banner/'.$imageName);

            Banner:: where ('ban_slug', $ban_slug)->update([
                'ban_image'=>$imageName
            ]);
        }

        if ($update) {
            return redirect()->route('banner.all')->with('success', 'Banner Updated Successfully!');
        } else {
            return redirect()->route('banner.add')->with('error', 'Banner Updated Failed! Please Try Again');
        }
        
    }

    // Delete Data Directly
    // public function delete($ban_slug){
    //     $delete=Banner:: where('ban_slug', $ban_slug)->delete([]);
    //     if($delete){
    //         return redirect()->route('banner.all')->with('success', 'Banner Deleted Successfully!');
    //     }else{
    //         return redirect()->route('banner.all')->with('error', 'Banner Deleted Failed! Please Try Again');
    //     }
    // }

    public function softdelete(Request $request){
        $id=$request['modal_id'];
        $softdelete= Banner:: where ('ban_status', 1)->where ('ban_slug', $id)->update(['ban_status'=> 0]);
        if($softdelete){
            return redirect()->route('banner.all')->with('success', 'Banner Deleted Successfully!');
        }else{
            return redirect()->route('banner.all')->with('error', 'Banner Deleted Failed! Please Try Again');
        }
    }


    public function pdfDownload(){

        $bandata = Banner::where ('ban_status', 1)->orderBy('ban_id', 'DESC')->get();
        // return view('admin.banner.invoice', compact('bandata'));
        $pdf=Pdf::loadView('admin.banner.invoice' , compact('bandata'));
        return $pdf->download();
    }    
    
    public function pdfDownloadIndividual($ban_slug){

        $data = Banner::where ('ban_slug', $ban_slug)->firstOrFail();
        // return view('admin.banner.bannerIndividual', compact('data'));
        $pdf=Pdf::loadView('admin.banner.bannerIndividual' , compact('data'));
        return $pdf->download();
    }

    public function printExcel(){
        return Excel::download(new BannerExport, 'all-banner.xlsx');
    }

    public function uploadExcel(Request $request){
        $request->validate([
            'bannerExcel' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new BannerImport, $request->file('bannerExcel'));
        return redirect()->route('banner.all')->with('success', 'Banner Deleted Successfully!');
    }
    
}
