<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-name') • {{config('app.name', 'The Outcasts')}}</title>

    @yield('page-includes')
    <link rel="canonical" href={{url()->full()}}>
    <link rel="stylesheet" href={{asset("css/layouts/main.css") }}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav-container">
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
                @can('create', App\Models\Article::class)
                    <div class="col-4 pt-1 blog-header-action">
                        <a class="link-secondary" href="/news/create">
                            <span>Write</span>
                            <img src={{ asset('icons/write.svg') }}>
                        </a>
                    </div>
                @elsecan('approve', App\Models\Article::class)
                    <div class="col-4 pt-1 blog-header-action">
                        <a class="link-secondary" href="/news/admin">Admin</a>
                    </div>
                @endcan   
            <div class="d-flex justify-content-center col-4 text-center">
                <a class="blog-header-logo site-name" href="/">Turmeric News</a>
            </div>
            <div class="text-dark col-4 d-flex justify-content-end align-items-center">
                @guest
                    <a class="auth-btn btn btn-md" href="/login">Login</a>
                @else
                    <span class="auth-name">Hy, {{ Auth::user()->name }}</span>
                    <a class="auth-btn btn btn-md" href="/logout"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="/logout" method="POST" class="d-none">
                            @csrf
                    </form>
                @endguest
            </div>
          </div>
        </header>
      
        <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="/news/categories/finance">Finance</a>
            <a class="p-2 link-secondary" href="/news/categories/economy">Economy</a>
            <a class="p-2 link-secondary" href="/news/categories/politics">Politics</a>
            <a class="p-2 link-secondary" href="/news/categories/business">Business</a>
            <a class="p-2 link-secondary" href="/news/categories/markets">Market</a>
          </nav>
        </div>
    </div>
    <main class="main-container">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer-top-container">
            <div class="footer-logo-container">
                <div class="logo-container" style="margin-right: 0rem;">
                    <span class="logo-name">Turmeric News</span>
                </div>
            </div>
            <div class="footer-links-container">
                <ul class="footer-links">
                    <a href="/news/categories/finance"><li>Finance</li></a>
                    <a href="/news/categories/economy"><li>Economy</li></a>
                    <a href="/news/categories/markets"><li>Market</li></a>
                    <a href="/news/categories/business"><li>Business</li></a>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>
                <span>Copyright &copy Turmeric News</span>
                <span class="copyright-designed-with">
                    <span class="copyright-dot"> • </span> Designed with <img src="{{ asset('icons/heart-filled.svg') }}" alt=""> by <span id="ht">Yours Truly</span>
                </span>
            </p>
        </div>
    </footer>
</body>
</html>
@yield('js-code')