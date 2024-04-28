<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Blog Post </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">


          
          <div class="row">
            @foreach($post as $data)
             <div class="col-md-4" style="padding: 30px">
                <div><img src="/postimage/{{$data->image}}" class="services_img"></div>
                <h4>{{$data->tittle}}</h4>
                  <p>Post By<b>{{$data->name}}</b></p>
                <div class="btn_main"><a href="{{url('post_details',$data->id)}}">Read more</a></div>
             </div>      
           
                
            @endforeach
          </div>
       </div>
    </div>
 </div>