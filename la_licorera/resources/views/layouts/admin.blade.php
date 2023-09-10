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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--traer estilos de la carpeta de css-->
    <title>@yield('title',__('layoutAdmin.title'))</title>
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
                <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">{{__('layoutAdmin.home')}}</a>
                </li>
                <li><a href="{{ route('admin.product.index') }}"
                        class="nav-link text-white">{{__('layoutAdmin.products')}}</a></li>

                @guest
                <li><a class="nav-link active" href="{{ route('login') }}">{{__('layoutAdmin.logIn')}}</a></li>
                <li><a class="nav-link active" href="{{ route('register') }}">{{__('layoutAdmin.register')}}</a>
                </li>
                @else
                <li><a class="nav-link text-white"
                        href="{{ route('admin.recipe.create') }}">{{__('layoutAdmin.recipe')}}</a></li>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    <li><a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">{{__('layoutAdmin.logOut')}}</a>
                    </li>
                    @csrf
                </form>
                @endguest
                <li>
                    <a href="#" class="mt-2 btn bg-primary text-white">{{__('layoutAdmin.back')}}</a>
                </li>
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

    <!--header-->
    <!--footer-->
    <div class="copyright py-4 text-center">
        <div class="container">
            <small> {{__('layoutAdmin.copyright')}} -
                <a class="text-reset fw-bold text-decoration-none" target="_blank">
                    {{__('layoutAdmin.authors')}}
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

</body>

</html>