@extends('master')
@section('content')
<div class="container">
    <div class="main jumbotron mt-5 mb-5 " id="jam">
        
      <h1>WELCOME {{Auth::user()->name}}</h1>
      <p class="lead">Here are all of your classes </p>
      <p class="lead">Happy Learning </p>
     
      <div class="container aaa">
        
        <div class="row justify-content-LEFT ">
          <div class="col-12 col-md-10 col-lg-8">
              <form class="card card-sm" action="/search">
                @csrf  
                <div class="card-body row no-gutters align-items-center">
                      <div class="col-auto">
                          <i class="fas fa-search h4 text-body"></i>
                      </div>
                      <!--end of col-->
                      <div class="col">
                          <input id="vv" class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Search class by ID">
                      </div>
                      <!--end of col-->
                      <div class="col-auto ml-2">
                          <input type="submit" class="btn btn-lg btn-outline-success" value="Search" id="">
                      </div>
                      <!--end of col-->
                  </div>
              </form>
          </div>
          <!--end of col-->
      </div>
      
  </div>
   </div>
   @if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif
   @if(Session::has('msg1'))
<p class="alert alert-danger">{{ Session::get('msg1') }}</p>
@endif  
 @if($count > 0)
                  @foreach ($hc as $cla)
                  <div class="col-xs-6 col-lg-3 zoom" >
             
                        <h2>{{$cla->Name}}</h2>
                        <p class="lead">Teacher Name: {{$cla->TName}}</p>
                        <p class="lead">Max.of Students: {{$cla->MaxStu}}</p>
                        <p><a class="btn btn-outline-success" href={{url('/classdetail/'.$cla->id)}} role="button">View details »</a></p>
                        <p><a class="btn btn-outline-danger" href={{url('/leave/'.$cla->id)}} role="button">Leave Class</a></p>
                 
                    </div>
                    @endforeach
                    @endif
                    @if($count == 0)
                    <div class="jumbotron"> 
                        <h1 class="display-4 text-center"> Nothing to Learn ?</h1>
                        <a href="{{url('/showclass')}}" class="btn btn-warning d-block mt-3 ups"> Start Enrolling ! </a>
                    </div>
                    @endif 
           

        </div><!--/row-->

     
        
@endsection