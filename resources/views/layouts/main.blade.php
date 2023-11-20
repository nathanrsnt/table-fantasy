<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6aa92d4619.js" crossorigin="anonymous"></script>
    <style> 
        .pesquisa-input {
            width: 900px;
        }

        body {
            background-color: #F8F6F6;
        }

        .navbar {
            background-color: #9B349D;
        }

        .navbar-nav .dropdown-toggle::after {
            content: none;
        }

        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
    <div class="container-fluid">
        <a class="navbar-brand me-5 ms-4" href="#"><img src="/img/logorpg.png" width="145px" height="35px" title="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                <li class="nav-item ms-2">
                    <a class="nav-link active" aria-current="page" href="{{route('home') }}" style="color: #547FBC; font-weight: bold;">Home</a>
                </li>
                @auth
                <li class="nav-item ms-2">
                    <a class="nav-link" href="{{route('personagens.index') }}" style="color: #547FBC; font-weight: bold;">Personagens</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link" href="{{route('grupos.index') }}" style="color: #547FBC; font-weight: bold;">Grupos</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDarkDropdownMenuLink">
                        @auth
                        <li class="nav-item">
                            <a class="btn" style="background-color: white; color: black; font-weight: bold;"><i class="fa-solid fa-user"></i> {{ auth()->user()->name }}<a>
                            <a href="{{ route('profile.show')}}" class="btn" style="background-color: white; color: #547FBC; font-weight: bold;"><i class="fa-solid fa-address-card"></i> Acessar Perfil</a>
                        </li>
                        <li class="nav-item">
                            <hr>
                            <a class="btn" style="background-color: white; color: black; font-weight: bold;">Session ID: {{ auth()->user()->id }}<a>
                            
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <hr>
                                <button type="submit" class="btn btn-outline" style="color: red; font-weight: bold;"><i class="fa-solid fa-door-open"></i> Logout</button>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="btn btn-outline me-2">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn" style="background-color: white; color: #547FBC; font-weight: bold;">Sign Up</a>
                        </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-3">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
