@extends('master')
@section('content')
<div class="container">
@foreach ($data as $dat)
        
    <h1 class="text-center display-03">Submit your file for :{{$dat->C_Name}}</h1>
    <br>
    <div class="sub">
    <h3>Class ID :{{$dat->C_ID}}</h3>
    <h3>FOR TASK ID:{{$dat->id}} </h3>
    <h3>FOR TASK :{{$dat->Desc}} </h3>
    </div>
    <br>    
    <form class="form-group" action={{url('/stufile/'.$dat->id)}} enctype="multipart/form-data" method="post">
        @csrf
        <input type="file" name="file" class="form-control" placeholder="Submit your file">
        <br>   
        <label for=""><b>Private Comments</b></label>
        <input type="text" name="cmt" class="form-control">
        <br>
        <input class="btn btn-danger" type="submit" name="" id="">    
    </form>
    @endforeach
</div>    
        
@endsection