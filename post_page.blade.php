<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
<style>
    .post_tittle{
        color: white;
        font-size: 30px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        padding: 30px;
    }
    .div_center{
      text-align: center;
      padding: 20px;
    }
    label{
      display: inline-block;
      width: 200px;
    }
     .btn btn-primary{
    position: relative;
    font-size: 18px;
    font-weight: bold;
    height: 45px;
    padding: 10px 20px;
    background: white;
    overflow: hidden;
    border-radius: 10px;
    border: 2px solid;
    color: #334b79;
    z-index:1;
    transition: 0.5s all ease;   

    }
    btn btn-primary:hover{
      cursor: pointer;
      color: white;
      border: 0px;
      background: red
    }   
</style>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.navbar')
      <!-- Sidebar Navigation end-->
    <div class="page-content">
    
        <h1 class="post_tittle">Add Post</h1>
        @if(session()->has('massage'))

        <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
       {{session()->get('message')}}
        </div>
  
  
        @endif

  <div>
    <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
      @csrf
<div class="div_center">
  <label for="">Post Tittle</label>
  <input type="text" name="tittle">
</div>

<div class="div_center">
  <label for="">Post Description</label>
 <textarea name="description"  cols="20" rows="5"></textarea>
</div>

<div class="div_center">
  <label>Add Image</label>
  <input type="file" name="image">
</div>

<div class="div_center">
  <input type="submit" class="btn btn-primary">
</div>
 
{{-- <div>
  <button class="btn" name="submit">Submit</button>
</div> --}}

    </form>
  </div>

    </div>
      
      @include('admin.fotter')
  </body>
</html>