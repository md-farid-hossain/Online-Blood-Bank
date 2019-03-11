@extends('layouts.app')

<style type="text/css">
 .default{
    border-radius: 100%;
    max-width: 100px; 
 }

 .feature_image{
    max-width: 300px;
    max-height: 200px; 
 }


#ved{
    margin: 20px;
}

.ac{
    color: green;
}
.dc {
    color: red;


</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
            @endif

            <div class="card">
                <div class="card-header"><i class="fas fa-eye"></i> All Request View</div>

                    <div class="card-body">

                        
                        <div class="col-md-12">
                            <div style="float: left;" class="cat_box">

                            <ul>
                                @if(count($categories) > 0)
                                    @foreach($categories->all() as $category)
                                        <li class="list-group-item">
                                            <a href='{{ url("category/{$category->id}")}}'>{{$category->category}}</a>
                                        </li>
                                    @endforeach

                                @else
                                <p>No Category Found!</p>
                                @endif
                            </ul>

                        </div>


                        <div style="float: right;"class="col-md-8">
                        @if(count($posts) > 0)
                            @foreach($posts->all() as $post)
                                <h5>{{$post->last_name}}</h5>
                                <h2>{{$post->post_title}}</h2>
                                <hr/>
                               @if($post->category_id ==1)
                                    <h3>A+</h3>
                                @endif
                                
                                @if($post->category_id ==2)
                                    <h3>O+</h3>
                                @endif
                                
                                @if($post->category_id ==3)
                                    <h3>B+</h3>
                                @endif
                                
                                @if($post->category_id ==4)
                                    <h3>AB+</h3>
                                @endif
                                
                                @if($post->category_id ==5)
                                    <h3>A-</h3>
                                @endif
                                
                                @if($post->category_id ==6)
                                    <h3>O-</h3>
                                @endif
                                
                                @if($post->category_id ==7)
                                    <h3>B-</h3>
                                @endif
                                
                                @if($post->category_id ==8)
                                    <h3>AB-</h3>
                                @endif
                                <img src="{{$post->blood_fimage}}" class="feature_image" alt="">
                                <p class="ptag">{{$post->post_body}}</p>
                                <h3>{{$post->phone}}</h3>
                                @if($post->status==1)
                                    <h3 class="ac">Post Status : Active</h3>
                                @else 
                                    <h3 class="dc">Post Status : Deactive</h3>
                                @endif


                                <ul class="nav nav-pills">
                                        <li role="presentation">
                                            <a href='{{url("/view/{$post->id}")}}'>
                                                <span id="ved" class="fa fa-eye"> View Full Post</span>
                                            </a>
                                        </li>
                                        
                                    </ul>

                                    <cite style="float: left;">Posted On : {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                    <hr/>
                                    <hr/>

                            @endforeach
                        @endif
                                
                        </div>

                            
                    </div>
                                   
                    
                            
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
