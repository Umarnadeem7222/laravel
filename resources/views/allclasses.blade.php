@extends('master')
@section('content')
<div class="container">
<table class="table table-bordered table-striped">
<tr>
    <th>ID</th>
    <th>NAME</th>
    <th>TEACHER NAME</th>
    <th>MAX. STUDENTS</th>
    <th>ACTION</th>
</tr>
@foreach ($data1 as $stu1)
    <tr>
        <td>{{$stu1->id}}</td>
        <td>{{$stu1->Name}}</td>
        <td>{{$stu1->TName}}</td>
        <td>{{$stu1->MaxStu}}</td>
        <td><a href="{{url('/showclass/athDB/'.$stu1->id)}}" class="btn btn-success">ENROLL CLASS</a></td>
        
    </tr>
@endforeach

</table>
</div>
@endsection