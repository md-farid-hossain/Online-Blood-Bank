@extends('layouts.app')
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
                <div class="card-header">Update Post</div>

                <div class="card-body">
                    
                        <form method="POST" action="{{ url('\editPost'), array($posts->id) }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row ">
                            <label for="post_title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="post_title" type="text" class="form-control{{ $errors->has('post_title') ? ' is-invalid' : '' }}" name="post_title" value = "{{$posts->post_title}}" required>

                                @if ($errors->has('post_title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="post_body" class="col-md-4 col-form-label text-md-right">Discriptions</label>

                            <div class="col-md-6">
                                <textarea id="post_body" rows="5" type="text" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" name="post_body" required> {{$posts->post_body}} </textarea>

                                @if ($errors->has('post_body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Blood Group</label>

                            <div class="col-md-6">
                                <select id="category_id" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>

                                    <option value="{{$category->category_id}}">{{$category->category}}</option>

                                        @if(count($categories) > 0)
                                            @foreach($categories->all() as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        @endif

                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blood_fimage" class="col-md-4 col-form-label text-md-right">Feature Image</label>

                            <div class="col-md-6">
                                <input id="blood_fimage" type="file" class="form-control{{ $errors->has('blood_fimage') ? ' is-invalid' : '' }}" name="blood_fimage" required>

                                @if ($errors->has('blood_fimage'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('blood_fimage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                            <div class="col-md-6">
                                <input id="phone" type="input" class="form-control" name="phone" value = "{{$posts->phone}}" placeholder="Mobile Number" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <select id="status_id" type="text" class="form-control{{ $errors->has('status_id') ? ' is-invalid' : '' }}" name="status" required>

                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                    @if(count($statuses) > 0)
                                            @foreach($statuses->all() as $status)
                                                <option value="{{$status->id}}">{{$status->status}}</option>
                                            @endforeach
                                    @endif
                                    
                                </select>

                                @if ($errors->has('status_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-success">
                                   <i class="fas fa-user-plus"></i> Update Post
                                </button>
                            </div>
                        </div>
                    </form>
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
