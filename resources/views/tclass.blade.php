@extends('master')
@section('content')

      <div class="container main">
        <div class="jumbotron mt-5 mb-5 " id="jam">
         
          <h1>WELCOME {{Auth::user()->name}}</h1>
          <p class="lead">Here are all of your classes </p>
          <p class="lead">Happy Uploading ! :) </p>
          
          <div class="container">
            <form action="/showstu" class="form-group">
                @csrf
                <label for="exampleFormControlSelect1">See Enrolled Students</label>
                <select class="form-control" id="classes" name="classes" style="width: 350px" id="exampleFormControlSelect1">
                    <option value="" id="classes"selected disabled>---All Classes---</option>
                  @foreach ($data as $data3)
                  <option>{{ $data3->Name}}</option>
                  @endforeach
                  
                </select>
                <input type="submit" value="Filter" class="btn btn-danger right mt-3">
            </form>
            </div>
           
       </div>
       <div class="container">
        @if(Session::has('msg'))
          <p class="alert alert-success">{{ Session::get('msg') }}</p>
          @endif
        </div>
        @if($count == 0)
        <div class="jumbotron">
          <h1 class="display-3 text-center"> CREATE CLASS NOW  !!</h1>
        </div>
        @endif
        
       <div class=" col-xs-12 col-sm-9 addclass  mb-3 mt-2">
         <form action="/addclass">
           @csrf
          <input type="text" placeholder="CLASS ID" class="form-control bb mb-3" id="" name="cid">
          <input type="text" placeholder="CLASS NAME" class="form-control bb mb-3" id="cname" name="cname">
          <input type="text" placeholder="MAX STUDENTS ALLOWED" class="form-control bb mb-3" id="ms" name="ms">
          <input type="submit" name="upload" id="" class="btn btn-success" value="CREAT CLASS">
        </form>
        </div>
      
                
        @if($count > 0)
        <div class="row">
          @foreach ($data as $data1)
              
          
            <div class="col-xs-6 col-lg-3 nclass" >
              <a href="{{url('/delete1/'.$data1->id)}}" id="ab1" class="btn btn-danger mt-3"><i class="fas fa-minus-circle"></i></a>
              <h2>{{$data1->Name}}</h2>
             
                <p class="lead">Class ID: {{$data1->id}}</p>
                <p class="lead">Your ID: {{$data1->T_ID}}</p>
                <p><a class="btn btn-success" href="{{url('/view/'.$data1->id)}}" role="button">View details »</a></p>
                <p><a class="btn btn-info" href="{{url('/upload/'.$data1->id)}}" role="button">Upload »</a></p>
                
                
          
              </div><!--/.col-xs-6.col-lg-4-->
              @endforeach
            </div>
            @endif
            <!--/row-->
   <!--/.col-xs-12.col-sm-9-->

</div><!--/row-->
   
@endsection