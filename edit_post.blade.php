<!DOCTYPE html>
<html>
  <head> 
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
        .auto{
            margin: auto;
        } 
    </style>
    <base href="/public">
    @include('admin.css')
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.navbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <h1 class="post_tittle">Update Post</h1>

    <form action="{{url('update_post',$data->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
<div class="div_center">
  <label for="">Post Tittle</label>
  <input type="text" name="tittle" value="{{$data->tittle}}">
</div>

<div class="div_center">
  <label for="">Post Description</label>
 <textarea name="description"  cols="20" rows="5">{{$data->description}}</textarea>
</div>

<div class="div_center">
<label>Old Image</label>
<img src="/postimage/{{$data->image}}" width="50px" height="50px" class="auto">
</div>

<div class="div_center">
  <label>update Image</label>
  <input type="file" name="image">
</div>

<div class="div_center">
  <input type="submit" class="btn btn-primary">
</div>
    </form>

      </div>
      @include('admin.fotter')
  </body>
</html>