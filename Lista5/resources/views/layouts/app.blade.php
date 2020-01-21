<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js">
    </script>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
<div id="app">
    <input type="hidden" value="{{\Auth::user()}}" id="userStatus"/>

    @section('nav')
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <img style="height:90px" src="/img/cryptography.png">
                <h1 class="navbar-item title"><strong>Zakamarki kryptografii</strong></h1>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" onclick="home()">
                        Strona główna
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" onclick="registerForm()">
                                <strong>Zarejestruj się</strong>
                            </a>
                            <a class="button is-light" onclick="loginForm()">
                                Zaloguj
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @show
    {{--        <div class="notification_layout">--}}
    <div class="notification is-danger" id="logoutNotification" style="display: none">
        <p class="notification_logout_text"></p>
    </div>
{{--    {{dd(Cookie::get('cookies_policy'))}}--}}
    @if(Cookie::get('cookies_policy') != "1")
    <div class="notification is-info cookies_info" id="cookiesNotification">
        <button class="delete" onclick="cookiesClose()"></button>
        <section style="justify-content: space-between; display: flex">
            <div style="width: 85%">
                W ramach naszej witryny stosujemy pliki cookies w celu świadczenia Państwu usług na najwyższym poziomie,
                w tym w sposób dostosowany do indywidualnych potrzeb. Korzystanie z witryny bez zmiany ustawień
                dotyczących
                cookies oznacza, że będą one zamieszczane w Państwa urządzeniu końcowym. Możecie Państwo dokonać w
                każdym
                czasie zmiany ustawień dotyczących cookies.
            </div>
            <div style="width: 15%; justify-content: center; display: flex; align-items: center">
                <button class="button is-light" onclick="acceptCookie()">Akceptuj</button>
            </div>
        </section>
    </div>
    @endif

    {{--        </div>--}}
    <div style="min-height: 79%">
        @yield('content')

    </div>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>Ilość odwiedzin: <strong id="visitorsAmount"></strong></p>
            <p>
                Lista 5 z przedmiotu Nowoczesne Technologie WWW
            </p>
        </div>
    </footer>
</div>


</body>
<script>
  function loginForm() {
    window.location.href = '/login'
  }

  function registerForm() {
    window.location.href = '/register'
  }

  function home() {
    window.location.href = '/'
  }

  var timeoutInMiliseconds = 300000;

  var timeoutId;

  function startTimer() {
    timeoutId = window.setTimeout(doInactive, timeoutInMiliseconds)
  }

  function doInactive() {
    let userStatus = document.getElementById('userStatus').value
    if (userStatus) {
      axios.post('/logout').then((result) => {
        let p = document.getElementsByClassName('notification_logout_text')
        p[0].innerText = "Z powodu zbyt długiego braku aktywności zostaniesz za chwilę wylogowany"
        document.getElementById('logoutNotification').style = "display: block"

        setTimeout(function () {
          window.location.reload();

        }, 5000);

      }).catch(function (error) {
        console.log(error)
      });
    }

  }

  function resetTimer() {
    window.clearTimeout(timeoutId)
    startTimer();
  }

  function setupTimers() {
    document.addEventListener("mousemove", resetTimer, false);
    document.addEventListener("mousedown", resetTimer, false);
    document.addEventListener("keypress", resetTimer, false);
    document.addEventListener("touchmove", resetTimer, false);

    startTimer();
  }

  function getCurrentIPAddress() {
    axios.post('/storeIP').then((result) => {
      getVisitors()
    }).catch(function (error) {
      console.error(error)
    });
  }

  function getVisitors() {
    axios.get('/visitors', {}).then((result) => {
      console.log(result)
      document.getElementById('visitorsAmount').innerText = result.data.visitors
    }).catch(function (error) {
      console.log(error)
    })
  }

  function cookiesClose() {
    document.getElementById('cookiesNotification').style = "display: none"
  }

  function acceptCookie() {
    axios.post('/acceptCookie',)
      .then((result) => {
        cookiesClose()
      window.location.href = "/login"
    }).catch(function (error) {

    });
  }

  setupTimers();
  getCurrentIPAddress()
  getVisitors()

</script>
</html>
