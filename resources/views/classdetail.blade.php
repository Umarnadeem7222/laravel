@extends('master')
@section('content')
<body>
        
    

   
   <div class="container tcb">
     @if($count < 1)
     <h1 class="display-5 mt-5 ml-5">Nothing Uploaded Yet !!</h1>
     @endif
     @if($count > 0)
     @foreach ($data2 as $datas)
     
     <h1 class="display-5 mt-5 ml-5">Class Name: {{$datas->Name}}</h1>
     <h1 class="display-5 mt-5 ml-5">Class ID: {{$datas->id}}</h1>
     <h2 class=" mt-5 ml-5">TEACHER: {{$datas->TName}}</h2>         
     
     @endforeach
     @endif
   </div>
       <div class="container">
   @if(Session::has('msg'))
   <p class="alert alert-info">{{ Session::get('msg') }}</p>
   @endif
   @if(Session::has('msg1'))
   <p class="alert alert-danger">{{ Session::get('msg1') }}</p>
   @endif
  </div>
   <div class="container">
           <div class="row">
               
           <div class="content col-lg-9 left">
             @foreach ($data1 as $data)
             @if($data->Path == 'docx')
             @php
             $data->Name = 'word.png';
        @endphp
 @endif
 
             @if($data->Path == 'pdf')
               @php
             $data->Name = 'pdf.png';
                @endphp
              @endif
 
             @if($data->Path == 'txt')
             @php
             $data->Name = 'txt.jpg';
        @endphp
 @endif
             <div class="content1 col-lg-10 mt-3 mb-2"><P class="lead">{{$data->Desc}}</P>
              <br>
              <h1 class="cont">{{$data->Oname}}</h1>
              <img src="{{asset('/file/'.$data->Name)}}" style="height:120px" alt=""><br>
              <a href="{{url('/download/'.$data->id)}}"> <i class="fas fa-download mt-2 mb-3" style="height: 50px,width:50px"></i></a>
              @if($data->S_FILE == 1)
              
              <a  class="btn btn-success btn-outline mt-3 ml-2 mb-2" href="{{url('/stu/'.$data->id)}}"> upload file </a>
              @endif
            </div>
            
             @endforeach
            
           </div>
           
       </div>
   </div>
@endsection