<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <!--traer cosas de boostrap (el stylesheet)-->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" /> <!--traer estilos de la carpeta de css-->
    <title>@yield('title',__('layoutAdmin.title'))</title>
</head>

<body>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    <title>@yield('title', __('layoutAdmin.subtitle'))</title>
    </head>

    <body>
        <div class="row g-0">
            <!-- sidebar -->
            <div class="p-3 col fixed text-white bg-dark">
                <a href="#" class="text-white text-decoration-none">
                    <span class="fs-4">{{__('layoutAdmin.panel')}}</span>
                </a>
                <hr />
                <ul class="nav flex-column">
                    <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">{{__('layoutAdmin.home')}}</a></li>
                    <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">{{__('layoutAdmin.products')}}</a></li>
                    <li>
                        <a href="#" class="mt-2 btn bg-primary text-white">{{__('layoutAdmin.back')}}</a>
                    </li>
                    @guest
                        <li><a class="nav-link active" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-link active" href="{{ route('register') }}">Register</a></li>
                    @else
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                        <li><a role="button" class="nav-link active"
                        onclick="document.getElementById('logout').submit();">Logout</a></li>
                    @csrf
                        </form>
                    @endguest
                </ul>
            </div>
            <!-- sidebar -->
            <div class="col content-grey">
                <nav class="p-3 shadow text-end">
                    <span class="profile-font">{{__('layoutAdmin.admin')}}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
                </nav>
                <div class="g-0 m-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </nav>
</br>
    <header class = "masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle',__('layoutAdmin.slogan'))</h2>
        </div>  
    </header>
    <!--header-->
    <div class="container py-4">@yield('content')</div>
    <!--footer-->
    <div class="copyright py-4 text-center">
        <div class="container">
            <small> {{__('layoutAdmin.copyright')}} -
                <a class="text-reset fw-bold text-decoration-none" target="_blank">
                {{__('layoutAdmin.authors')}}
                </a>
            </small>
        </div>
        <!-- footer -->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>

    </body>

</html>