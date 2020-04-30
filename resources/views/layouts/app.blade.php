<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title >UlyanaAmirova</title>
    <link rel="icon" type="image/ico" href="{{ asset('img/icon.png') }}" />
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- eye icon for count views -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164816429-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-164816429-1');
    </script>

    <!-- Tinymce rich text editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


</head>
<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-info navbar-dark shadow">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    
                   <h3 class="text-white"><i> <b> Ulyana </b> </i></h3>
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="dropdown" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/home') }}">Главная<span class="sr-only">(current)</span></a>
                        </li>
                        
                        <li class="nav-item {{ Request::is('books*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/books') }}">Книги<span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item {{ Request::is('blogs*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/blogs') }}">Блоги<span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item {{ Request::is('about*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ url('/about') }}">Обо мне<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> -->
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>

                                <div><a href="{{ url('/admin') }}" class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">Администратор</a></div>

                            </li>

                            
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

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="page-footer font-small text-white sticky-bottom bg-info fixed-bottom">

        
        <div class="footer-copyright text-center">
            © UlyanaAmirova 2020
        </div>
    

    </footer>

    
    
</body>
</html>
