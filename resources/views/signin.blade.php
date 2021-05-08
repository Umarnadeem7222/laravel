@extends('master')
@section('content')
<div class="container col-md-6 col-sm-12  " id="signupstu">
    <h1 class="display-5 text-center mt-5"> WELCOME TO SIGN-UP</h1>
    <form name="frm" method="post" action="{{url('/addstu')}}">
      @csrf
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"><p class = "lead"> NAME</p></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Name" name="name1" >
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label"><p class = "lead"> EMAIL</p></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id = "Input1" placeholder="Email" name="email" >
          </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><p class = "lead">PASSWORD</p></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id = "pass1" placeholder="Password" name="pass" >
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><p class = "lead"> AGE</p></label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="age1" placeholder="Age" name="age" >
            </div>
          </div>
          
          
        <div class="form-group row">
          <div class="col-sm-2"><p class = "lead">DATE OF BIRTH</p></div>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="date" id="gridCheck1" name="DOB">
            </div>
          </div>
        </div>
        <br>
        <div>
            <input type="submit" class="btn btn-primary ml-2">
        </div>
      </form>

</div>
@endsection