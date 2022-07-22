<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container header__container">

                <div class="header__logo">
                    <a href="{{ route('main.index') }}" class="">
                        <img src="{{ asset('images/logo.svg') }}" alt="header logo">
                    </a>
                </div>

                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('main.index') }}">Blog</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('personal.index') }}">Personal</a>
                        </li>
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="{{ route('category.index') }}">Category</a>
                        </li>
                    </ul>
                </nav>

                <div class="header__registration">
                    @auth()
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="header__nav-link logout">logout</button>
                    </form>
                    @endauth

                    @guest()
                        <a class="header__nav-link login" href="/login">Log in</a>
                        <a class="header__nav-link signup" href="/register">Sign up</a>
                    @endguest
                </div>
                <i class="fa-solid fa-bars header__menu-btn" id="header__menu-btn"></i>

                <aside class="sidemenu" id="sidemenu">
                    <ul class="sidemenu__list">
                        <a class="sidemenu__item" href="{{ route('main.index') }}">Blog</a>
                        <a class="sidemenu__item" href="{{ route('personal.index') }}">Personal</a> 
                        <a class="sidemenu__item" href="{{ route('category.index') }}">Category</a>
                        @auth
                            <form class="" action="{{ route('logout') }}" method="post">
                            @csrf
                                <button class="sidemenu__item logout" type="submit">logout</button>
                            </form>
                        @endauth

                        @guest
                                <a class="sidemenu__item login" href="/login">Log in</a>
                                <a class="sidemenu__item signup" href="/register">Sign up</a>
                        @endguest
                    </ul>
                </aside>
        </header>

        @yield('content')

        <footer class="footer">
            <div class="footer__copyright">
                <div class="container">
                    <p>674 Gonzales Drive. Washington, PA 15301</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ mix('js/main.js') }}"></script>
</body>
</div>

</html>
