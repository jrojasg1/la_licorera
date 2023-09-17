<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <!--traer cosas de boostrap (el stylesheet)-->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    <!--traer estilos de la carpeta de css-->
    <title>@yield('title',__('layout.title'))</title>
</head>

<body>
    <!--header--esto es para ponerlo como generico o para que solo aparesca en la home page-->
    <nav class="navbar navbar-expand-lg bg-dark  border-bottom border-body" data-bs-theme="dark">
        <!--señalar que se hara una nav bar que se podra retraer-->
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.index') }}">{{__('layout.logo')}}</a>
            <!--{{ route('home.index') }}se esta ponendo a que el letrero de online store vaya a la home page-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <!--hacer que el simbolo para sacar la navbar solo aparesca cuando esta en pantalla pequeña -->
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" >
                <!--poniendo cosas en la navbar-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('product.index') }}">{{__('layout.licor')}}</a>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto">
                    @guest
                    <a class="nav-link active" href="{{ route('login') }}">{{__('layout.logIn')}}</a>
                    <a class="nav-link active" href="{{ route('register') }}">{{__('layout.register')}}</a>
                    @else
                    @csrf
                    <a class="nav-link " href=""><h5>{{ Auth::user()->getName() }} - {{ Auth::user()->getWallet() }} {{__('layout.wallet')}} </h5></a>
                    <a class="btn btn-success mr-5" href="{{ route('myaccount.orders') }}">{{__('layout.order')}}</a>
                    
                    <a class="btn btn-success mr-5" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart-fill"></i>
                    </a>
                    
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="btn btn-primary"
                            onclick="document.getElementById('logout').submit();">{{__('layout.logOut')}}
                        </a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle',__('layout.slogan'))</h2>
        </div>
    </header>
    <!--header-->
    <div class="container py-4">@yield('content')</div>
    <!--footer-->
    <div class="copyright py-4 text-center">
        <div class="container">
            <small> {{__('layout.copyright')}} -
                <a class="text-reset fw-bold text-decoration-none" target="_blank">
                    {{__('layout.authors')}}
                </a>
            </small>
        </div>
    </div>
    <!--footer-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
    </script>
</body>

</html>