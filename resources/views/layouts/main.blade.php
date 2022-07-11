<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container header__container">
                <a href="" class="header__logo">
                    <img src="{{ asset('images/logo.svg') }}" alt="header logo">
                </a>
                <nav class="header__nav">
                    <a class="header__nav-link" href="">Blog</a>
                </nav>
                <!-- <div class="header__right">
                    <nav class="header__nav">
                        <ul class="header__nav-list">
                            <li class=""></li>
                            <li class="header__search"></li>
                        </ul>
                    </nav>
                </div> -->
                <!-- <div class="header__inner">
                    <button class="header__btn">
                        <img src="{{ asset('images/icon_menu.svg') }}" alt="icon menu">
                    </button>
                   @include('includes.rightside-menu')
                </div> -->
            </div>
        </header>
        @yield('content')
        <footer class="footer">
            <div class="footer__content">
                <div class="container">
                    <a class="logo" href="">
                        <img src="{{ asset('images/logo.svg') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="container">
                    <p>674 Gonzales Drive. Washington, PA 15301</p>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ mix('js/main.js') }}"></script>
</body>
</div>

</html>
