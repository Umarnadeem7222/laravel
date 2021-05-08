@extends('master')
@section('content')
<div class="container">
    @foreach ($stu1 as $stu)
    <div class="display-3 text-center">
        Students for {{$stu->Name}}
        
    </div>
        
    @endforeach
    <br><hr><br>
    @if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif

    <br><hr><br>
    @if($count == 0)
    <div class="jumbotron">
        <h1 class="display-3 text-center"> NO STUDENT ENROLLED YET !! </h1>
    </div>
    @endif
    @if($count > 0)
<table class="table table-bordered table-striped">
<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>Action</th>
    
</tr>
@foreach ($data1 as $dat)
    <tr>
        <th>
            {{$dat->id}}
        </th>
        <th>
            {{$dat->name}}
        </th>
        <th>
            {{$dat->email}}
        </th>
        <th>
            <a href={{url('/block/'.$dat->id.'/'.$stu->id)}} class="btn btn-outline-danger">BLOCK</a>
        </th>
    </tr>
    
    
@endforeach
</table>
@endif
</div>
@endsection