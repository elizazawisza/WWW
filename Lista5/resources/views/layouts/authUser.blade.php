@extends('layouts.app')

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
                        @if(\Auth::user())
                            <a class="button is-primary" onclick="logout()" v-if="{{\Auth::user()}}">
                                <strong>Wyloguj się</strong>
                            </a>
                        @else
                            <a class="button is-primary" onclick="loginForm()" v-if="{{\Auth::guest()}}">
                                <strong>Zaloguj się</strong>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

<script>
  function logout() {
    axios.post('/logout').then((result) => {
      window.location.href = "/"
    }).catch(function (error) {
      console.log(error)
    });
  }

  function home() {
    window.location.href = '/'
  }


</script>