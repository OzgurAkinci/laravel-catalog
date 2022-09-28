<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>e-Katalog</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script>
        function loadFinish() {
            $(".laodBox").hide();
            $(".global-container").show();
        }
    </script>

</head>

<body onload="loadFinish()">
    <div class="laodBox"><div class="loader8"></div></div>

  <div class="global-container" id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
          e-Katalog
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            @if (Auth::check())
              <li class="nav-item active">
                <a class="nav-link" href={{ url('/') }}><i class="bi bi-house-door"></i> Anasayfa <span class="sr-only">(current)</span></a>
              </li>
                  <li class="nav-item">
                      <a class="nav-link" href={{ url('/products') }}><i class="bi bi-star"></i> Tüm Ürünler</a>
                  </li>
              <li class="nav-item">
                  <a class="nav-link" href={{ url('/create-order') }}><i class="bi bi-cart-plus"></i> Sipariş Oluştur (Secured)</a>
              </li>
              @if (Auth::user()->hasRole('admin'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-shield-check"></i> Sistem Yönetimi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href={{ route('system.product-groups.index') }}>Ürün Grupları</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href={{ route('system.products.index') }}>Ürünler</a>
                  </div>
                </li>
              @endif
            @endif
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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Çıkış Yap') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
  <!-- development version, includes helpful console warnings -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  @yield('footer-scripts')
</body>

</html>
