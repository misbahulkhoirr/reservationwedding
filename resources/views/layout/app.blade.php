<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>IYUS MAKE UP</title>
    <link rel="shortcut icon" href="{{asset('assets/img/whiteLogo.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
 
  .iconClass{
    position: relative;
  }
  .iconClass span{
    font-size: 10px;
    background-color: red;
    border-radius: 50%;
    position: absolute;
    top: 0px;
    right: 2px;
    display: block;
  }
</style>
  </head>
  <body>
   
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
        <div class="container">
          <a class="navbar-brand" href=""><img src="{{asset('assets/img/whiteLogo.png')}}" width="100" alt=""></a>
          @auth
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav me-auto mb-5 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('paket*') ? 'active' : '' }}" href="{{ url('paket') }}">Paket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('busana*') ? 'active' : '' }}" href="{{ url('busana') }}">Busana</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('dokumentasi*') ? 'active' : '' }}" href="{{ url('dokumentasi') }}">Dokumentasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('entertainment*') ? 'active' : '' }}" href="{{ url('entertainment') }}">Entertainment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('catering*') ? 'active' : '' }}" href="{{ url('catering') }}">Catering</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('mc*') ? 'active' : '' }}" href="{{ url('mc') }}">MC</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('pelaminan*') ? 'active' : '' }}" href="{{ url('pelaminan') }}">Pelaminan</a>
              </li>
{{--               
              <li class="nav-item dropdown">
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                 
                  <li><a class="dropdown-item" href="/home"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                 
                  <li>
                      <form action="/logout" method="POST">
                        @csrf
                          <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                      </form>
                    </li>
                </ul>
              </li> --}}

            </ul>
            <ul class="navbar-nav navbar-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle  {{ Request::is('home') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  {{-- @if(auth()->user()->role_id ==2) --}}
                  <li><a class="dropdown-item" href="/home"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
                  <li><hr class="dropdown-divider"></li>
                  {{-- @endif --}}
                  <li>
                      <form action="/logout" method="POST">
                        @csrf
                          <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                      </form>
                    </li>
                </ul>
              </li>
              
            </ul>
          </div>
          @endauth
        </div>
      </nav>
   

      <div style="margin-top: 100px; padding-bottom:100px;">
      
            @yield('content')
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>