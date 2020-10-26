<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   public function Edit()
   {
        $setting = Setting::first();
        //dd($setting);
        return view('backend.setting.edit-setting',compact('setting'));
   }
   //insert setting method
   public function insert_setting(Request $request)
   {
        $data = new Setting();
        $data->name = $request->name;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instragram;
        $data->reedit = $request->reddit;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->copyright = $request->copy;
        $data->about_site = $request->description;
        $data->save();
        if($request->file('file')){
            $file = $request->file('file');
            // @unlink(public_path('upload/logo/'.$data->site_logo));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path('upload/logo'),$filename);
            $data['site_logo'] = $filename;

        }
        $insert = $data->save();
        if($insert){
            $notification=array(
                'message'=>'Successfully Inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
   }
   // update setting method
   public function update_setting(Request $request)
   {
       $data = Setting::first();
       $data->name = $request->name;
       $data->facebook = $request->facebook;
       $data->twitter = $request->twitter;
       $data->instagram = $request->instragram;
       $data->reedit = $request->reddit;
       $data->email = $request->email;
       $data->phone = $request->phone;
       $data->address = $request->address;
       $data->copyright = $request->copy;
       $data->about_site = $request->description;
       $data->update();
       if($request->file('file')){
           $file = $request->file('file');
           @unlink(public_path('upload/logo/'.$data->site_logo));
           $filename = date("YmdHi").$file->getClientOriginalName();
           $file->move(public_path('upload/logo'),$filename);
           $data['site_logo'] = $filename;

       }
       $update = $data->save();
       if($update){
           $notification=array(
               'message'=>'Successfully Updated',
               'alert-type'=>'success'
           );
           return redirect()->back()->with($notification);
       }else{
           $notification=array(
               'message'=>'Something went worng!',
               'alert-type'=>'error'
           );
           //return Redirect()->back()->with($notification);
           return redirect()->back()->with($notification);
       }
   }
}
