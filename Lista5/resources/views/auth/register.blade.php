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
                        <a class="button is-primary" onclick="loginForm()">
                            <strong>Zaloguj się</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')

            <div class="container register-form">
                <div class="rows is-centered">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input name_input" type="email" id="loginInput" placeholder="Login">
                            <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                        </p>
                        <p class="name_error help is-danger"></p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input email_input" type="email" id="emailInput" placeholder="Email">
                            <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                        </p>
                        <p class="email_error help is-danger"></p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input password_input" type="password" id="passwordInput" placeholder="Hasło">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                        <p class="password_error help is-danger"></p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input password_input" type="password" id="repeatPasswordInput" placeholder="Powtórz hasło">
                            <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                        </p>
                        <p class="password_error help is-danger"></p>
                    </div>
                    <div class="field">
                        <p class="control ">
                            <button class="button is-success" onclick="register()">
                                Zarejestruj
                            </button>
                        </p>
                    </div>

                </div>
            </div>

@endsection
<script>
  function register(){
    let email = document.getElementById('emailInput').value
    let password = document.getElementById('passwordInput').value
    let name = document.getElementById('loginInput').value
    let repeatPassword = document.getElementById('repeatPasswordInput').value
    console.log(repeatPassword)
    console.log(password)
    axios.post('/register', {
      'name' : name,
      'email': email,
      'password': password,
      'repeatPassword': repeatPassword
    }).then((result) => {
      window.location.href = "/login"
    }).catch(function (error) {
      if(error.response.data.errors.name){
        document.getElementsByClassName('name_error')[0].innerText = error.response.data.errors.name[0]
        document.getElementsByClassName('name_input')[0].setAttribute('class', 'input name_input is-danger')
      }
      if(error.response.data.errors.email){
        document.getElementsByClassName('email_error')[0].innerText = error.response.data.errors.email[0]
        document.getElementsByClassName('email_input')[0].setAttribute('class', 'input email_input is-danger')
      }
      if(error.response.data.errors.password){
        document.getElementsByClassName('password_error')[0].innerText = error.response.data.errors.password[0]
        document.getElementsByClassName('password_input')[0].setAttribute('class', 'input password_input is-danger')
      }

    });
  }
</script>