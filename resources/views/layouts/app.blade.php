<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b28fe2399a.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else

                            @if(Auth::user()->hasrole("usuario","escritor"))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mensaje.create') }}">{{ __('Enviar Mensaje') }}</a>
                            </li>
                            @endif

                            @if(Auth::user()->hasrole("escritor"))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mensaje.create') }}">{{ __('Enviar Mensaje') }}</a>
                            </li>
                            @endif


                            @if(Auth::user()->hasrole("administrador"))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mensaje.index') }}">{{ __('Ver Mensajes') }}</a>
                            </li>
                            <!--Notifiacioes de envios de mensajes -->
                        
                            <!-- Termino de dropwdown mensajes -->                            
                            @endif


                            <!--Dropwiwd de logout-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    @if(Auth::user()->hasrole("administrador"))
                                    <a class="dropdown-item" href="{{ url('libro') }}">
                                        {{ __('Libros') }}
                                    </a>
                            
                                    <a class="dropdown-item" href="{{ url('roleuser') }}">
                                        {{ __('Asignar Permisos') }}
                                    </a> 
                                    <a class="dropdown-item" href="{{ url('user') }}">
                                        {{ __('Editar Perfil') }}
                                    </a> 

                                    
                                    @endif
                                    @if(Auth::user()->hasrole('escritor'))
                                    <a class="dropdown-item" href="{{ route('libro.create') }}">
                                        {{ __('Agregar Libro') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('user') }}">
                                        {{ __('Editar Perfil') }}
                                    </a>
                                    @endif

                                    @if(Auth::user()->hasrole('usuario'))
                                    <a class="dropdown-item" href="{{ url('user') }}">
                                        {{ __('Editar Perfil') }}
                                    </a>
                                    @endif
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <!--fin de dropwdown de logout-->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>                                    
                                     <i class="fas fa-bell">
                                    @if (count(auth()->user()->unreadNotifications))
                                      <span class="badge badge-warning">{{ count(auth()->user()->unreadNotifications) }}</span>                        
                                    @endif
                                    </i>                                                                  
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <span class="dropdown-header">Notificaciones por leer: </span>
                                    @forelse(auth()->user()->unreadNotifications as $notification)                                                                      
                                    <a class="dropdown-item" href="">
                                    <i class="fas fa-envelope mr-2"></i> {{ $notification->data['titulo'] }}
                                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                    </a>
                                    @empty
                                    <span class="ml-3 pull-right text-muted text-sm">{{ count(auth()->user()->unreadNotifications) }} para leer </span>                            
                                    @endforelse
                                    <!--aca va el dropdrow divider-->
                                    <!--<div class="dropdown-divider"></div>
                                    <span class="dropdown-header">Notifiaciones Leidas</span>
                                    @forelse(auth()->user()->readNotifications as $notification)
                                    <a class="dropdown-item" href="{{ url('libro') }}">
                                    <i class="fas fa-envelope mr-2"></i> {{ $notification->data['titulo'] }}                                        
                                    <span class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                    </a>                                         
                                    @empty
                                        <span class="ml-3 pull-right text-muted text-sm"> Sin notificaciones leidas</span>
                                       
                                    @endforelse
                                    -->
                                    <div class="dropdown-divider"></div>
                                        <a href="{{route('markAsRead')}}" class="dropdown-item dropdown-footer">Mark all as read</a>
                                    </div>
                                                                                                       
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
           
            @yield('content')
             <div class="container-fluid">
            @if(session('message'))
                <div class="row mb-2">
                    <div class="alert alert-danger">
                        {{session('message')}}
                    </div>
                </div>
            @endif
            </div>
            
        </main>
    </div>
</body>
</html>
