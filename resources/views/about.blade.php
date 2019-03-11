@extends('layouts.app')

<style type="text/css">

#m_image{
    border-style:solid; border-width:1px; height:200px; width:200px;
}

#f_image{
    border-style:solid; border-width:1px; height:200px; width:200px;


}
#masud    {
    float: left;
}

#details_masud  {
     float: right;
}

#developers {
    margin: auto;
}

#Development_Skil{
    margin-top: 50px;
}

</style>




@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            

            <div class="card">
                <div class="card-header"><i class="fab fa-connectdevelop"></i> About Developers</div>

                    <div class="card-body">
                        
                        <div id="developers"class="col-md-12">

                            <div id="masud" class="col-md-12">
                                <div class="col-md-12">

                                    <img id="m_image" alt="Image" class="rounded img-thumbnail img-fluid" src="https://scontent.fdac24-1.fna.fbcdn.net/v/t1.0-9/50257532_2266463870298588_748569085515661312_n.jpg?_nc_cat=100&_nc_ht=scontent.fdac24-1.fna&oh=07880f97fe53d8e2519c2ffd785ecce0&oe=5D1D8801" />
                                    <div id="details_masud" class="col-md-9">
                                    <h1>Pervej Mia</h1>
                                    <h4 style="font-size:120%;" ><i class="far fa-envelope"></i> pervej.cse1011@gmail.com</h4>
                                    <h4 style="font-size:120%;" ><i class="fab fa-facebook-square"></i> Masud-Parves</h4>
                                    <h4 style="font-size:120%;" ><i class="fab fa-github"></i> Masud-Parves</h4>
                                    <h4 style="font-size:120%;" ><i class="fas fa-graduation-cap"></i> Department of Computer Science & Engineering</h4>
                                    <h4 style="font-size:120%;" ><i class="fas fa-university"></i> Z.H. Sikder University of Science & Technology</h4>
                                    
                                </div>
                                </div>
                                
                                
                            </div>

                            <div id="masud" class="col-md-12">
                                <hr/>
                                <div class="col-md-12">

                                    <img id="m_image" alt="Image" class="rounded img-thumbnail img-fluid" src="https://scontent.fdac24-1.fna.fbcdn.net/v/t1.0-9/50257532_2266463870298588_748569085515661312_n.jpg?_nc_cat=100&_nc_ht=scontent.fdac24-1.fna&oh=07880f97fe53d8e2519c2ffd785ecce0&oe=5D1D8801" />
                                    <div id="details_masud" class="col-md-9">
                                    <h1>Farid Hossain</h1>
                                    <h4 style="font-size:120%;" ><i class="far fa-envelope"></i> engr.farid97@gmail.com</h4>
                                    <h4 style="font-size:120%;" ><i class="fab fa-facebook-square"></i> Ahmed Farid</h4>
                                    <h4 style="font-size:120%;" ><i class="fab fa-github"></i> Ahmed Farid</h4>
                                    <h4 style="font-size:120%;" ><i class="fas fa-graduation-cap"></i> Department of Computer Science & Engineering</h4>
                                    <h4 style="font-size:120%;" ><i class="fas fa-university"></i> Z.H. Sikder University of Science & Technology</h4>
                                    
                                </div>
                                </div>
                                
                                <hr/>
                            </div>
                            

                            
                        
                            
                        </div>
                        

                        <div id="Development_Skil" class="col-lg-10 col-xl-10 offset-lg-1 ">

            <table class="table table-bordered table-dark text-center">
                <tbody>
                <tr>
                    <th>Requirement Development</th>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>Languages/Web Development</th>
                <td>PHP, JavaScript, HTML, CSS, SQL</td>
            </tr>
            <tr>
                <th>Frameworks</th>
                <td >Laravel 5.7, Botstrap 4, jQuery, AJAX, CURD</td>
            </tr>
            
            <tr>
                <th>Databases</th>
                <td >MySQL</td>
            </tr>
            <tr>
                <th>Version Control</th>
                <td >Git</td>
            </tr>
            <tr>
                <th>Tools</th>
                <td >PHP Strome, Sublime Text 3, Visual Studio Code</td>
            </tr>

            </tbody>
        </table>
        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
