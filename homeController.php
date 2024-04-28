<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\post;

use Alert;

class homeController extends Controller
{
    public function index(){
        if(Auth::id()){

            $post = post::all();
            $usertype=Auth()->user()->usertype;

            if($usertype=='user'){
                return view('home.homepage',compact('post'));
            }
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }

            else{
                return redirect()->back();
            }
        }
    }
    public function homepage(){
        $post = post::where('post_status','=','active')->get();
        return view('home.homepage',compact('post'));
    }
    public function post_details($id){
        $post = post::find($id);
        return view ('home.post_details',compact('post'));
    }

    public function create_post(){
        return view('home.create_post');
    }

    public function user_post(Request $request){
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

$post = new post;
$post->tittle = $request->tittle;
$post->description = $request->description;

$post->user_id = $userid;
$post->name = $name;
        $post->usertype = $usertype;
        $post->post_status = 'pending';

$image =$request->image;

if($image){
    $imageName=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('postimage',$imageName);
    $post->image = $imageName;
}
$post->save();

Alert::success('congrats','you have added the data succesfully');

return redirect()->back();

    }

    public function my_post(){

        $user = Auth()->user();
        $userid = $user->id;
        $data = post::where('user_id','=',$userid)->get();
        return view ('home.my_post',compact('data'));
    }
    public function my_post_delete($id){
    $data = post::find($id);
    $data->delete();

    return redirect()->back()->with('massage','post deleted successfully');
    }

    public function my_post_update($id){

        $data = post::find($id);
  return view('home.my_post_update',compact('data'));
    }

    public function update_post_data(Request $request,$id){
        $data = post::find($id);
        $data->tittle = $request->tittle;
        $data->description = $request->description;

        $image =$request->image;

if($image){
    $imageName=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('postimage',$imageName);
    $data->image = $imageName;
}
$data->save();
return redirect()->back()->with('massage','post updated successfully');

    }
    
}
