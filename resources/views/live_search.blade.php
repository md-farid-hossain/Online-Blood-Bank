<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>Online Blood Bank</title>
      
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="logo/blood-clipart-blood-clipart.png"/>
    

    {{-- Twitter Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">


    <style>
        #navbarSupportedContent{
            color:#514d54;
        }        
    </style>

  </head>
     <body>
      <br />
      <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('logo/logo.png') }}" style="width: 80px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                          <a class="nav-link" href="/home"><i class="fas fa-home"></i> Home</a>
                          <a class="nav-link" href="/index"><i class="fab fa-odnoklassniki"></i> Doner</a>
                          <a class="nav-link" href="/post"><i class="fas fa-plus-circle"></i> Request</a>
                          <a class="nav-link" href="/allrequest"><i class="fas fa-cubes"></i> All Request</a>
                          <a class="nav-link" href="/community"><i class="fas fa-hands-helping"></i> Community</a>
                          <a class="nav-link" href="/about"><i class="far fa-address-card"></i> About Us</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fullName }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/myprofile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ url('/updateprofile') }}">
                                        Update Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 
      <div class="container box">
       <h3 align="center">Doner List</h3><br />
       <div class="panel panel-default">
        

        <div class="card-header"><i class="fas fa-search"></i> Search Doner | <a href="{{url('create')}}"><i class="fab fa-odnoklassniki"></i> Become A Doner</a></div>


        <div class="panel-body">
         <div class="form-group">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search Doner" />
         </div>
         <div class="table-responsive">
          <h3 align="center">Total Doner : <span id="total_records"></span></h3>
          <table class="table table-striped table-bordered">
           <thead>
            <tr>
             <th>Doner Name</th>
             <th>Blood Group</th>
             <th>Mobile No.</th>
             <th>Email</th>
             <th>Division</th>
             <th>District</th>

            </tr>
           </thead>
           <tbody>

           </tbody>
          </table>
         </div>
        </div>    
       </div>
      </div>
   </body>
</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
