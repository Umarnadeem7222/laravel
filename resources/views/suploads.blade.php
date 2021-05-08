@extends('master')
@section('content')
    @foreach ($data1 as $dat)
    <div class="tcb">
    <h1> Submissions for class : {{$dat->CName}}</h1>
    <h1> Task Discription : {{$dat->Task}}</h1>
    <h1> Task ID : {{$dat->Task_ID}}</h1>
</div>
    @endforeach

     <BR>
    <hr>
   
@foreach ($data as $dada)
@if($dada->Ext == 'docx')
@php
$dada->Name = 'word.jpg';
@endphp
@endif

@if($dada->Ext == 'pdf')
@php
$dada->Name = 'pdf.jpg';
@endphp
@endif

@if($dada->Ext == 'txt')
@php
$dada->Name = 'txt.jpg';
@endphp
@endif
<div class="sup col-lg-5 col-xs-12  mb-5 left">
<h6>File Name: {{$dada->OName}}</h6>
<h6>File From: {{$dada->S_Name}}</h6>
<h6>ID: {{$dada->S_ID}}</h6>
<img src="{{asset('/stufile/'.$dada->Name)}}" style="height:120px" alt=""><br>
<h5  style="width: 350px">student comment : {{$dada->comment}}</h5>
<a href="{{url('/download1/'.$dada->id)}}"> <i class="fas fa-download mt-2 mb-3 mr-4"></i></a>
</div>
@endforeach



  
@endsection