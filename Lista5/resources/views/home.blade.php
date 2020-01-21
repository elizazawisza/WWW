@extends('layouts.authUser')

@section('content')

    <div class="main_page_article" style="padding-top: 7.5rem">
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Schemat Goldwasser-Micali szyfrowania probabilistycznego</strong></h3>
                    <ul>
                        <li>
                            Algotym generowania kluczy
                        </li>
                        <li>
                            Algorytm szyfrowania
                        </li>
                        <li>
                            Algorytm deszyfrowania
                        </li>
                    </ul>
                    <hr>
                    <ol>
                        <li>
                            <strong>Reszta/niereszta kwadratowa</strong>
                        </li>
                        <li>
                            <strong>Symbol Legendre'a i Jacobiego</strong>
                            <ul>
                                <li>
                                    Własności symbolu Legendre’a
                                </li>
                                <li>
                                    Własnoś́ci symbolu Jacobiego
                                </li>
                                <li>
                                    Algorytm obliczania symbolu Jacobiego
                                </li>
                                <li>
                                    Algorytm obliczania symbolu Legendre’a
                                </li>
                            </ul>
                        </li>
                    </ol>
                    <a onclick="part1()">Więcej</a>
                </div>
            </article>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Schemat progowy \( (t, n) \) dzielenia sekretu Shamira</strong></h3>
                    <ul>
                        <li>
                            Faza inicjalizacj
                        </li>
                        <li>
                            Faza łączenia udziałów w sekret
                        </li>
                    </ul>
                    <hr>
                    <ol>
                        <li>
                            Interpolacja Lagrange’a
                        </li>
                    </ol>
                    <a onclick="part2()">Więcej</a>
                </div>
            </article>
        </div>
    </div>


@endsection

<script>
    function part1(){
      window.location.href = '/part1'
    }
    function part2(){
      window.location.href = '/part2'
    }

</script>


