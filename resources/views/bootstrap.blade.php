<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <title>WingtipToys - @yield('title')</title>
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">WingtipToys</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @ifroute('product') active @endifroute">
                        <a class="nav-link" href="{{ route('product_all') }}">Home
                            @ifroute('product')<span class="sr-only">(current)</span>@endifroute
                        </a>
                    </li>
                    <li class="nav-item @ifroute('cart') active @endifroute">
                        <a class="nav-link" href="{{ route('cart_get') }}">Cart
                            @ifroute('cart')<span class="sr-only">(current)</span>@endifroute
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-primary" href="{{ route('cart_get') }}" role="button">Cart @if (isset($cartitemCount) &&
                $cartitemCount > 0) <span class="badge badge-light">{{ $cartitemCount }}</span>@endif</a>
        </div>
    </header>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @section('jumbotron')
            <h1 class="display-4">Jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            @show
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
