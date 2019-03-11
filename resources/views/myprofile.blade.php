@extends('layouts.app')

<style type="text/css">
 .default{
    border-radius: 100%;
    max-width: 100px; 
 }

 .card-body {
  display: flex;
  justify-content: center;
}

#profile_id {
    align-content: right;
  width: 300px;
}
</style>




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}
                        </div>
                    @endforeach
            @endif

            @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
            @endif

            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <div id="profile_id" class="col-md-8">
                        @if(!empty($profile))
                            <img src="{{ $profile->profile_pic }}" class="default" alt="" >
                        @else
                            <img src="{{ url('images/default.png') }}" class="default" alt="" >
                        @endif

                            
                        @if(!empty($profile))
                            <p class="lead">Name : {{ $profile->full_name }}</p>
                        @endif

                        @if(!empty($profile))
                            <p class="lead">Blood Group :

                                @if($profile->category_id ==1)
                                    A+
                                @endif
                                
                                @if($profile->category_id ==2)
                                    O+
                                @endif
                                
                                @if($profile->category_id ==3)
                                    B+
                                @endif
                                
                                @if($profile->category_id ==4)
                                    AB+
                                @endif
                                
                                @if($profile->category_id ==5)
                                    A-
                                @endif
                                
                                @if($profile->category_id ==6)
                                    O-
                                @endif
                                
                                @if($profile->category_id ==7)
                                    B-
                                @endif
                                
                                @if($profile->category_id ==8)
                                    AB-
                                @endif


                            </p>

                        @else
                            <p class="lead">Blood Group : Not Added Yet</p>
                        @endif
                        @if(!empty($profile))
                            <p class="lead">Status(Blood) : @if($profile->status ==1)
                                    Ready To Donate
                            @else
                                Not Available
                                @endif</p>
                        @else
                            <p class="lead">Status(Blood) : Not Added Yet</p>
                        @endif
                        
                        @if(!empty($profile))
                            <p class="lead">Mobile Number : {{ $profile->phone }}</p>
                        @else
                            <p class="lead">Mobile Number : Not Added Yet</p>
                        @endif
                        
                        @if(!empty($profile))
                            <p class="lead">eMail : {{ $profile->email }}</p>
                        @endif
                        
                        @if(!empty($profile))
                            <p class="lead">Address : {{ $profile->address }}</p>
                        @else
                            <p class="lead">Address : Not Added Yet</p>
                        @endif
                        <hr>
                        <hr>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
