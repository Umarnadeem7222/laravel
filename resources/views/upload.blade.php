@extends('master')
@section('content')


@foreach ($data5 as $data2)
<h1 class="display-3 text-center"><b> UPLOAD YOUR {{$data2->Name}} FILES</b></h1>

<div class="container">
    
    <form action="{{url('/upload1/'.$data2->id)}}" method = 'post' enctype="multipart/form-data">
        @csrf
        <label for="formFileLg" class="form-label"><b> UPLOAD FILES HERE</b></label>
    <input class="form-control form-control-lg" name="file" id="formFileLg" type="file" />
    <textarea style="resize: none;" name="desc" id="" cols="50" rows="5" class = "mt-5" placeholder="ADD DISCRIPTION TO YOUR FILE"></textarea>
       <br>
       <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="switch1" name="sfile">
        <label class="custom-control-label" for ="switch1"><b>Expecting files from Students</b></label>
      </div>
       <br> <input type="submit" name="ok" id="" class="btns btn btn-primary" value="Upload">
</form>
<a href ="{{url('/view/'.$data2->id)}}" class="btns btn btn-success">VIEW {{$data2->Name}}'s Details </a>
</div>
@endforeach
@endsection