@extends('master')
@section('content')

@if($count == 0 )

<div>

<h2 class="container display-3 text-center">Nothing uploaded yet !! </h2>
<div class="display-4 text-center"> START UPLOADING NOW !</div>
<a href="{{url('/upload/'.$id)}}"   class="up btn btn-warning d-block mt-3"> UPLOAD </a>

</div>
@endif 
@foreach ($newfile1 as $data2)
<div class="container tcb">
  
  <h1 class="display-5 mt-5 ml-5 ">CLASS NAME:{{$data2->C_Name}}</h1>
  <h1 class="display-5 mt-5 ml-5 ">CLASS ID: {{$data2->C_ID}}</h1>
  <h2 class=" mt-5 ml-5">TEACHER: {{$data2->T_Name}}</h2>
  <a href="{{url('/showstu1/'.$data2->C_ID)}}" class="btn btn-info mt-3 ml-5 mb-2"><b>SEE STUDENTS<b></a>

</div>
<br>
<br>

  @endforeach
  
     
      <div class="modal fade bd-example-modal-lg"  id="modal" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <h1 class="display-4 text-center">REQUESTS</h1>
            <div class="showr offset-1 col-10 mb-3">
                <p class="lead aa"> STUDENT NAME <i class="fas fa-minus-circle float-right mt-2 ml-3" id="delete"></i> <i class="mt-2 fas fa-user-check float-right" id="accept"></i></p>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
           
            @foreach ($newfile as $data3)
            @if($data3->Path == 'docx')
            @php
            $data3->Name = 'word.png';
       @endphp
@endif

            @if($data3->Path == 'pdf')
            @php
            $data3->Name = 'pdf.png';
       @endphp
@endif

            @if($data3->Path == 'txt')
            @php
            $data3->Name = 'txt.png';
       @endphp
@endif
       <div class="content col-lg-8 left">
         <div class="content1 col-lg-11 mt-3 mb-2">
           <P class="lead">{{$data3->Oname}}</P>

            <h1 class="cont">{{$data3->Desc}}</h1>
            <br>
            
                
            <img src="{{asset('/file/'.$data3->Name)}}" style="height:120px" alt="">
     
            <br>  
            <div class="btns ml-3 ">
            <a href="{{url('/download/'.$data3->id)}}"> <i class="fas fa-download mt-2 mb-3 mr-4"></i></a>
            <a href="{{url('/delete/'.$data3->id)}}"> <i class="far fa-trash-alt"></i></i></a>
            @if($data3->S_FILE == 1)
            <a href="{{url('/supload/'.$data3->id)}}" id = "btn5" class="btn btn-outline-success ml-3 ">
             SEE SUBMISSIONS
            </a>
            @endif
          </div>
          </div>
        </div>
        @endforeach
      

        @endsection