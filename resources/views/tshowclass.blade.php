@extends('master')
@section('content')
    @foreach ($data1 as $tclass)
    <div class="row">
    <div class="col-xs-6 col-lg-4" >
        <h2>{{$tclass->Name}}</h2>
        <p class="lead">Teacher Name: {{$tclass->TName}}</p>
        <h5>Teacher ID {{$tclass->T_ID}}</h5>
        <h5>MAX STUDENTS {{$tclass->MaxStu}}</h5>
        <p><a class="btn btn-default" href="tclassdetail.html" role="button">View details »</a></p>
    </div><!--/.col-xs-6.col-lg-4-->
</div>
    @endforeach
@endsection