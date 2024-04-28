<!DOCTYPE html>
<html>
  <head> 
   <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')}}"> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
.data{
    color: white;
        font-size: 30px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        padding: 30px;
}
.table_deg{
    border: 1px solid white;
    width: 80%;
    text-align: center;
    margin-left: 70px;
    color: red;
    font-size: 20px;
}
td{
    color: lightblue;
    padding: 20px;
}

    </style>
    @include('admin.css')
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.navbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
    @if (session()->has('masseage'))
    <div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
{{session()->get('masseage')}}
    </div>
        
    @endif


    <h1 class="data">All Post Data</h1>
    <table class="table_deg">
        <tr>
            <th>Id</th>
            <th>Post tittle</th>
            <th>Description</th>
            <th>Post by</th>
            <th>Post status</th>
            <th>Usertype</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Update</th>
            <th>Status Accecpt</th>
            <th>Status Reject</th>



        </tr>
@foreach($data as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->tittle}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->name}}</td>
            <td>{{$post->post_status}}</td>
            <td>{{$post->usertype}}</td>
            <td>
        <img src="postimage/{{$post->image}}" width="40px" height="40px">
            </td>
            <td><a href="{{url('delete_post',$post->id)}}" class="btn btn-outline-danger"
                 onclick="confirfamion(event)">Delete</a></td>

                 <td><a href="{{url('edit_post',$post->id)}}" class="btn btn-outline-success rounded-pill"
                   >Edit</a></td>
                   <td>
                    <a onclick="return comfirm('are you want to sure accept this')" href="{{url('accept_post',$post->id)}}" class="btn btn-outline-info">Accept</a>
                   </td>
                   <td>
                    <a onclick="return comfirm('are you want to sure reject this')" href="{{url('reject_post',$post->id)}}" class="btn btn-outline-warning">Reject</a>
                   </td>


        </tr>

        @endforeach
    </table>

      </div>
      @include('admin.fotter')
      <script>
        function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                tittle:"Are You Sure To Delete this",
                text:"You Won't be able to revert this delete",
                icon:"warning",
                buttons: true,
                dangerMode:true,
            })

            .then((willCancel)=>            
            {
        if(willCancel){
    window.location.href = urlToRedirect;
        }
            });
        }
      </script>
  </body>
</html>