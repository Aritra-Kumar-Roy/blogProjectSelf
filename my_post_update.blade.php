<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @section('tittle')
    profile update
      @endsection
      <base href="/public">
     @include('home.homecss')
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
       .btn btn-outline-warning{
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
      btn btn-outline-warning:hover{
        cursor: pointer;
        color: white;
        border: 0px;
        background: red
      }  
      .auto{
          margin: auto;
      } 
  </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         
         @if(session()->has('massage'))
         <div class="alert alert-success">
         <button class="close" type="button" data-dismiss="alert"
         aria-hidden="true">x</button>
         {{session()->get('massage')}}
         </div>
         @endif

         <form action="{{url('update_post_data',$data->id)}}" method="POST" enctype="multipart/form-data">

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
    <img src="/postimage/{{$data->image}}" width="300px" height="200px" class="auto">
    </div>
    
    <div class="div_center">
      <label>update Image</label>
      <input type="file" name="image">
    </div>
    
    <div class="div_center">
      <input type="submit" class="btn btn-warning">
    </div>
        </form>
 >
      </div>
  

      @include('home.footer')
   
   
   </body>
</html>