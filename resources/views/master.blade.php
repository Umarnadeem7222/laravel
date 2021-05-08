<html lang="en">
  <head>
    <title>CLASSES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/example.css">
    <link rel="stylesheet" href="/css/csssignupstu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
      $(document).ready(function(){
          
            })
            $("#btn1").click(function(){
                $("#lnk").slideToggle(1000);
            })
            $("#btn3").click(function(){
              location.href='attendence.html'
            })
            $("#btn4").click(function(){
              $("#modal").modal("show");
            })
            $("#btn5").click(function(){
              $(".stulist").slideToggle(1000);
            })
        })
        $(document).ready(function(){
          var x = 1;
            $(".addclass").hide();
            $("#nat").click(function(){
                $("#pny").show().slideToggle(1000);
            })
            $("#bttn1").click(function(){
                $(".addclass").slideToggle(1500);                 
            })
            
            })
        })       
       $(document).ready(function(){
           $("#lnk").hide();
           $("#btn1").click(function(){
               $("#lnk").slideToggle(1000);
           })
       })
       $(document).ready(function(){
           $("#noti").hide();
          // $("#notify").click(function(){
               //$("#noti").slideToggle(1000);
           })
       })
      $(document).ready(function(){
        $("#ple").hide()
        $("#btn1").click(function(){
          $("#ple").slideToggle(1000);
         
         })
          $("#box").hide()
          $("#btn7").click(function(){
            $("#box").slideToggle(1000);
          })
      })
     
    </script>
     <script src="{{ asset('js/app.js') }}" defer></script>
   

  </head>
  <body style="background-color: rgb(255, 255, 255);">
    <nav class="navbar navbar-expand-lg">
        
            <img src="/imgs/logo.svg" class="logo1 left" alt="" >
            
             @if (Auth::user()->Role == 'Teacher') 
                 <a class="navbar-brand left" href="/tclass">HU SCHOOL NETWORK</a>
                 
            @endif
    
             @if (Auth::user()->Role == 'Student')  
                 <a class="navbar-brand left" href="/class">HU SCHOOL NETWORK</a>
                    
            @endif
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"><i class="fas fa-angle-double-down"></i></span>
            </button>
      <div class="container">
          

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <div class="navbar-nav">
                  @can('teacher-in')
                  <a class="nav-item nav-link" href="{{url('/tclass')}}">{{Auth::user()->name}}'s CLASS</a>
           
                  <!---<a class="nav-item nav-link" href="{{url('/showstu')}}"> REGISTERED STUDENTS</a> -->
                    @endcan
                    @can('student-in')
                    <a class="nav-item nav-link active" href="{{url('/class')}}">{{Auth::user()->name}}'s CLASSES</a>
                    <a class="nav-item nav-link active" href="{{url('/showclass')}}">ALL CLASSES</a>
                @endcan
                 
                </div>
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                      @endif
                      
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                        <div class="row">
                            <a class="far fa-bell mr-2 mt-2" id="notify"></a>
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}
                                 "onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
       @yield('content')
  

</body>
    </html>