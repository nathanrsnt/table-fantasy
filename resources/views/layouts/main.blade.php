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
            background-color: #9B349D; /* Altere esta cor para amarelo escuro */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFD700;"> <!-- Altere a cor do background aqui -->
    <div class="container-fluid">
        <a class="navbar-brand me-5 ms-4" href="#"><img src="/img/logorpg.png" width="145px" height="35px" title="logo"></a>
        <!-- Titulo do site no nav bar 
        <a class="navbar-brand" href="{{route('home') }}" style="color: black;">| Table Fantasy |</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('personagens.index') }}">Personagens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('grupos.index') }}">Party</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav me-5">
                <li class="nav-item pesquisa-input" id="navbarSupportedContent">
                    <form class="d-flex" action="" method="post">
                        @csrf
                        <input type="text" class="form-control col-lg-2 " placeholder=" 🔎 Pesquisar " id="search" name="search" style="background-color: #F8F6F6;">
                    </form>
                </li>
            </ul> 
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a href="{{ route('profile.show')}}" class="btn" style="background-color: white; color: #FFD700;">Perfil</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline ms-2" style="color: black;">Logout</button>
                    </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a href="/login" class="btn btn-outline me-2">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="btn" style="background-color: white; color: #FFD700;">Sign Up</a>
                </li>
                @endguest
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
