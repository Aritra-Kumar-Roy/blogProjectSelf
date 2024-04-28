<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @section('tittle')
      Your page
      @endsection
     @include('home.homecss')
     <style>
        .post_deg{
            padding: 30px;
            text-align: center;            
        }
        .tittle_deg{
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;

        }
        .des_deg{
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: whitesmoke;
        }
        .img_deg{
            height: 380px;
            width: 500px;
            padding: 30px;
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


         @foreach ($data as $post)            
        
         <div class="post_deg">
            <img class="img_deg" src="/postimage/{{$post->image}}" >
            <h4 class="tittle_deg">{{$post->tittle}}</h4>
            <p class="des_deg">{{$post->description}}</p>
            <a onclick="return confirm('are you want to delete this ?')" 
            href="{{url('my_post_delete',$post->id)}}" class="btn btn-outline-danger">Delete</a>
            <a href="{{url('my_post_update',$post->id)}}" class="btn btn-outline-info">Update</a>
         </div>
         @endforeach
       
      </div>
     

      @include('home.footer')
      
   </body>
</html>