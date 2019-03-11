@extends('layouts.app')

<style type="text/css">
  .pagi {
  display: flex;
  justify-content: center;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Doner List | <a href="{{url('create')}}">Become A Doner</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Blood Group</th>
                          <th scope="col">Status</th>
                          <th scope="col">Phone</th>
                        </tr>
                      </thead>
                      <tbody>
                       
                           @foreach($doners as $doner)
                           <tr>
                                <th>{{$doner->id }}</th>
                                <th>{{$doner->name }}</th>
                                <th>{{$doner->blood_group }}</th>
                                <th>{{$doner->status }}</th>
                                <th>{{$doner->phone }}</th>
                            </tr>
                            @endforeach
                        
                      </tbody>
                    </table>

                    <div class="pagi">{{$doners->links()}}<div>
                   
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
