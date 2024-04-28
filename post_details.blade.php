<!DOCTYPE html>
<html lang="en">
   <head>
    <style>
        .design{
            padding: 30px;
              /* height: 80px; 
             width:50px;
             margin:  */
        } 
    </style>
      <!-- basic -->
      @section('tittle')
     post details page
      @endsection
      <base href="/public">
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <div style="text-align: center" class="col-md-3">
        <div><img class="design" src="/postimage/{{$post->image}}" class="services_img"></div>
        <h3><b>{{$post->tittle}}</b></h3>
        <h4>{{$post->description}}</h4>

          <p>Post By<b>{{$post->name}}</b></p>
     </div>
     
      @include('home.footer')
     
   </body>
</html>