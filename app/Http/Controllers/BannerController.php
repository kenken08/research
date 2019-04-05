<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\banners;

class BannerController extends Controller
{
    public function showBanners(){
        $title = "Banners";
        $banners =  banners::all();
        return view('admindash.banners.index_banner',compact('title','banners'));
    }
    public function addBanner(Request $request){
        $this->validate($request, [
            'banner_title'=>'required|string',
            'description'=>'required|string',
            'uploadcover'=>'required|image'
        ]);

        if($request->hasFile('uploadcover')){
            $filenameWithExt = $request->file('uploadcover')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('uploadcover')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('uploadcover')->storeAs('public/banner_photo', $fileNameToStore);
        } else {
            $fileNameToStore ='noimage.png';
        }

        $announce = new banners;
        $announce->user_id = Auth::user()->id;
        $announce->title = $request->input('banner_title');
        $announce->description = $request->input('description');
        $announce->image = $fileNameToStore;
        $announce->status = "deactivated";
        $announce->save();

        session()->flash('success');
        return redirect()->back();
    }
    public function updateStat($id){
        $ban = banners::find($id);
        $ban->status =  "activated";
        $ban->save();

        session()->flash('successss');
        return redirect()->back();
    }
}
