<!DOCTYPE html>
<html lang="en">
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
         .btn btn-success{
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
        btn btn-success:hover{
          cursor: pointer;
          color: white;
          border: 0px;
          background: red
        }   
    </style>
      <!-- basic -->
      @section('tittle')
      create Post page
      @endsection
     @include('home.homecss')

   </head>
   <body>
    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
    
      <div style="margin: 20px";>
        <h1 class="post_tittle">Add Post</h1>
        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
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
        <input type="submit" class="btn btn-success">
      </div>
      </div>
    

      @include('home.footer')
    
   </body>
</html>