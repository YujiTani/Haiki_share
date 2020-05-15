<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="l_site__area">
    <div class="l-site__warapper">
        <nav class="l-header">
            <div>
                <a class="u_site--title u_display--center" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="l-header__nav">
                <!-- ログインしてなければ表示 -->
                @unless(Auth::guard('user')->check())
                <div class="c_nav-menu">
                    <li class="u_display--center fs__default text-color--default">
                        <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="u_display--center fs__default text-color--default">
                        <a class="nav-link" href="{{ route('user.register') }}">{{ __('Singin') }}</a>
                    </li>

                </div>
                @endunless
                @if(Auth::guard('user')->check())
                <div class="c_nav-menu">
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                        @csrf
                        <li class="u_display--center u_fs__default text-color--default">
                            <button type="submit" class="nav-link" href="{{ route('user.logout') }}">{{ __('Logout') }}</button>
                        </li>
                    </form>
                </div>
                @endif
            </div>
        </nav>

        <div id="app" class="l_main__container">

            <main class="">
                @yield('content')
            </main>
        </div>





        <footer class="l_footer">
            <div class=" l_footer__container">
                <div class="l_footer__layout--top u_display--center">
                    <img class="icon--md" src="/storage/img/HaikiShare_rogo.png" alt="">

                </div>
                <div class="l_footer__layout--bottom u_display--center--column">
                    <div class="u_img__unit">
                        <!-- 画像を作る -->
                        <img class="img__icon icon--sm" src="/storage/img/email-iconA.png" alt="">
                        <span class="u_white--text text-size__def mb-30">contact</span>
                    </div>
                    <h5 class="u_white--text text-size__min mb-30">©︎2020 yuzunosk website, inc.</h5>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>