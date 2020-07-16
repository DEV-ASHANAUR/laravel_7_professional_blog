<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    //view all user method
    public function view_user()
    {
        $alldata = User::all();
        $id = Auth::user()->id;
        return view('backend.user.view-user',compact(['alldata','id']));
    }
    //create user method
    public function create()
    {
        return view('backend.user.add-user');
    }
    //store user method
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $insert = $data->save();
        if($insert){
            $notification=array(
                'message'=>'Successfully User Created',
                'alert-type'=>'success'
            );
            return redirect()->route('user.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('user.view')->with($notification);
        }
    }
    //edit user
    public function edit($id)
    {
        $editdata = User::find($id);
        return view('backend.user.edit-user',compact('editdata'));
    }
    //update user method
    public function update(Request $request,$id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $update = $data->save();
        if($update){
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('user.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('user.view')->with($notification);
        }
        
    }
    //user delete method
    public function destroy($id)
    {
        $user = User::find($id);
        if(file_exists('upload/users_images/'.$user->image) AND ! empty($user->image)){
            unlink('public/upload/users_images/'.$user->image);
        }
        $del = $user->delete();
        if($del){
            $notification=array(
                'message'=>'Successfully Delete',
                'alert-type'=>'success'
            );
            return redirect()->route('user.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('user.view')->with($notification);
        }
    }
    //pass_change view method
    public function passview()
    {
        return view('backend.user.edit-password');
    }
    //password change method
    public function passchange(Request $request)
    {
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->cur_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $update = $user->save();
            if($update){
                $notification=array(
                    'message'=>'Successfully Change Your Password',
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
        }else{
            $notification=array(
                'message'=>'Your Current Password is worng!',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification);
        }
        
    }
    //view profile method
    public function view_profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view-profile',compact('user')); 
    }
    //edit profile method
    public function edit_profile()
    {
        $id = Auth::user()->id;
        $editdata = User::find($id);
        return view('backend.user.edit-profile',compact('editdata'));
    }
    // update profile method
    public function update_profile(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->description = $request->description;
        if($request->file('file')){
            $file = $request->file('file');
            @unlink(public_path('upload/users_images/'.$data->image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path('upload/users_images'),$filename);
            $data['image'] = $filename;

        }
        $update = $data->save();
        if($update){
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return redirect()->route('profile.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->route('profile.view')->with($notification);
        }
    }
}
