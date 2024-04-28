<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    public function post_page(){
        return view('admin.post_page');
    }

    public function add_post(Request $request){
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;
        $post= new post;
        $post->tittle = $request->tittle;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $post->post_status = 'active';
        $image=$request->image;
        if($image){
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imageName);
            $post->image = $imageName;
        }
      

        $post->save();
        return redirect()->back()->with('massage','post added successfully');

    }
    public function show_post(){
        $data = post::all();
        return view('admin.show_post',compact('data'));
    }
    public function delete_post($id){
   $post = post::find($id);

   $post->delete();
   return redirect('admin.show_post')->with('masseage','post deleted successfully');
    }

    public function edit_post($id){
        $data = post::find($id);
        return view('admin.edit_post',compact('data'));
    }

    public function update_post(Request $request,$id){
        $data = post::find($id);
        $data->tittle = $request->tittle;
        $data->description = $request->description;

        $image=$request->image;
        if($image){
            $imageName=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imageName);
            $data->image = $imageName;
           
        }
        $data->save();
        return redirect('admin.show_post');

    }

    public function accept_post($id){
        $data = post::find($id);

        $data->post_satus='active';
        $data->save();
        return redirect()->back()->with('massage','Post satatus activeted');
    }

    public function reject_post($id){
        $data = post::find($id);

        $data->post_satus='rejected';
        $data->save();
        return redirect()->back()->with('massage','Post satatus rejected');
}

}
