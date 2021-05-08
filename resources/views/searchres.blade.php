@extends('master')
@section('content')
    <h3 class="display-3 text-center"><u>Search Result</u></h3>
    @if($count == 0)
    <div class="jumbotron"> <h1 class="display-3 text-center"> NO RESULT ACCORDING TO YOUR SEARCH</h1></div>
    @endif
    @if($count > 0)
    <table  class="table table-bordered table-striped mt-4">
        <tr>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                TEACHER NAME
            </th>
            <th>
                MAX. STUDENTS
            </th>
            <th>
                ACTION
            </th>
        </tr>
        @foreach ($result as $stu1)
    <tr>
        <td>{{$stu1->id}}</td>
        <td>{{$stu1->Name}}</td>
        <td>{{$stu1->TName}}</td>
        <td>{{$stu1->MaxStu}}</td>
        <td><a href="{{url('/showclass/athDB/'.$stu1->id)}}" class="btn btn-success">ENROLL CLASS</a></td>
        
    </tr>
@endforeach
    </table>
    @endif
@endsection