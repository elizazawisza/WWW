@extends('layouts.authUser')

@section('content')

    <h1 class="title">Schemat Goldwasser-Micali szyfrowania probabilistycznego</h1>

    <div class="main_page_context">
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Schemat Goldwasser-Micali szyfrowania probabilistycznego</strong> </h3>
                    <ol type="a">
                        <li>Wybierz losowo dwie duze liczby pierwsze \(p\) oraz \(q\) (podobnego rozmiaru),</li>
                        <li>Policz \(p = pq\),</li>
                        <li>Wybierz \(y \in Z_n\), takie, ze \(y\) jest nieresztą kwadratową modulo \(n\) i symbol
                            Jacobiego
                            \(\left(\frac{y}{n}\right)=1\) (czyli \(y\) jest pseudokwadratem modulo \(n\))
                        </li>
                        <li> Klucz publiczny stanowi par \(n, y\) zaś odpowiadający mu klucz pry
                            watny to para \(p, q\),
                        </li>
                    </ol>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton4" onclick="showCommentInput('4')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification4" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com4" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText4"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('4')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments4list">

            </div>
        </div>
        <div class="notification is-success" id="commentNotification4" style="display: none">
            Komentarz został dodany poprawnie
        </div>
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Algorytm szyfrowania</strong><br>
                    Chcąc zaszyfrować wiadomość \(m\) przy użycia klucza publicznego \(n,y\) wykonaj kroku:
                    <ol type="a">
                        <li>Przedstaw \(m\) w postaci łańcucha binarnego \(m=m_1 m_2 \dots m_t\) długości \(t\),</li>
                        <li>
                            \( \texttt{ For $i$ from $1$ to $t$ do } \) <br>
                            \( \texttt{ wybierz losowe \(x \in \ \mathbb{Z}^*_n\) } \) <br>
                            \( \texttt{ If \(m_i=1\) then set \( c_i \leftarrow yx^2 \mod n\) } \) <br>
                            \( \texttt{ Otherwise set \(c_i \leftarrow x^2 \mod n\) } \) <br>
                        </li>
                        <li>Kryptogram wiadomości \(m\) stanowi \(c = \left(c_1, c_2, \dots, c_t\right)\)</li>
                    </ol>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton5" onclick="showCommentInput('5')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification5" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com5" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText5"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('5')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments5list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Algorytm deszyfrowania</strong><br>
                    Chcąc odzyskać wiadomość z kryptogramu \(c\) przy użyciu klucza prywatnego \(p, q\) wykonaj kroki:
                    <ol type="a">
                        <li>
                            \( \texttt{ For $i$ from $1$ to $t$ do } \) <br>
                            \( \texttt{ policz symbol Legendre'a \(e_i=(\frac{c_i}{p})\) (algorytm 3) } \) <br>
                            \( \texttt{ If \(e_i = 1\) then set \(m_i \leftarrow 0\) } \) <br>
                            \( \texttt{ Otherwise set \(m_1\leftarrow1\) } \) <br>
                        </li>
                        <li>
                            Zdeszyfrowana wiadomość to \(m=m_1m_2\dots m_t\)
                        </li>
                    </ol>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton6" onclick="showCommentInput('6')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification6" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com6" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText6"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('6')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments6list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Reszta/niereszta kwadratowa</strong></h3>
                    <strong>Definicja.</strong> Niech \(a \in \ \mathbb{Z}_n\). Mówimy, że \(a\) jest <i>resztą kwadratową
                        modulo
                        n
                        (kwadratem modulo n)</i>, jeżeli istnieje \(x \in \ \mathbb{Z}^*_n\) takie, że \( z^2 \equiv a \>
                    (mod
                    \>
                    p) \).
                    Jeżeli takie \(x\) nie istnieje, to wówczas \(a\) nazywamy <i>nieresztą kwadratową modulo n</i>.
                    Zbiór wszystkich reszt kwadratowych modulo \(n\) oznaczamy \( Q_n \),
                    zaź zbiór wszystkich niereszt kwadratowych modulo \(n\) oznaczamy \( \overline{ Q}_n \).
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton7" onclick="showCommentInput('7')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification7" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com7" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText7"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('7')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments7list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Symbol Legendre'a i Jacobiego</strong></h3>
                    <strong>Definicja.</strong> Niech \(p\) będzie nieparzystą liczbą pierwszą a \(a\) liczbą całkowitą.
                    <i>Symbol Legendre'a</i>
                    \( \left( a \over p \right) \) jest zdefiniowany jako:
                    $$
                    \left( a \over p \right) = \left \{
                    \begin{array}{rl}
                    0 & \textrm{ jeżeli } p|a \\
                    1 & \textrm{ jeżeli } a \in Q_p \\
                    -1 & \textrm{ jeżeli } a \in \ \overline{Q}_p
                    \end{array}
                    \right.
                    $$
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton8" onclick="showCommentInput('8')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification8" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com8" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText8"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('8')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments8list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Własności symbolu Lagendre'a.</strong> Niech \( a, b \in \mathbb{Z} \), zaś \(p\) to
                    nieparzysta
                    liczba pierwsza.
                    Wówczas:
                    <ul>
                        <li>\( \left( a \over p \right) \equiv a^{\frac{p-1}{2}} \mod p \)</li>
                        <li>\( \left( ab \over p \right) = \left( a \over p \right) \left( b \over p \right) \)</li>
                        <li>\( a \equiv b \mod p \Longrightarrow \left( a \over p \right) = \left( b \over p \right) \)
                        </li>
                        <li>\( \left( 2 \over p \right) = (-1)^{\frac{p^2 - 1}{8}} \)</li>
                        <li>Jeżeli \( q \) jest nieparzystą liczbą pierwszą inną od \(p\) to:</li>
                        $$
                        \left( p \over q \right) = \left( q \over p \right) (-1)^{ \frac{(p - 1)(q - 1)}{4} }
                        $$
                    </ul>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton9" onclick="showCommentInput('9')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification9" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com9" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText9"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('9')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments9list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Definicja.</strong> Niech \( n \geqslant 3 \) będzie liczbą nieparzystą a jej rozkład na
                    czynniki
                    pierwsze to \( n = p^{e_1}_1 p^{e_2}_2 \cdots p^{e_k}_k \). <i>Symbol Jacobiego</i> \( \left( a
                    \over n
                    \right) \)
                    jest zdefiniowany jako:
                    $$
                    \bigg( \frac{a}{n} \bigg) =
                    \left( a \over p_1 \right)^{e_1} \left( a \over p_2 \right)^{e_2} \cdots \left( a \over p_k
                    \right)^{e_k}
                    $$
                    Jeżeli \(n\) jest liczbą pierwszą, to symbol Jacobieo jest symbolem Legendre'a.<br>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton10" onclick="showCommentInput('10')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification10" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com10" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText10"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('10')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments10list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Właśności symbolu Jacobiego.</strong> Niech \( a, b \in \mathbb{Z} \), zaś \( m,n \geqslant
                    3 \)
                    to
                    nieparzyste
                    liczby całkowite. Wówczas:
                    <ul>
                        <li>\( \left( a \over n \right) = 0, 1 \), albo \(-1\). Ponadto \( \left( a \over n \right) = 0
                            \Longleftrightarrow gcd(a, b) \neq 1 \)
                        </li>
                        <li>\( \left( ab \over n \right) = \left( a \over n \right) \left( b \over n \right) \)</li>
                        <li>\( \left( a \over mn \right) = \left( a \over m \right) \left( a \over n \right) \)</li>
                        <li>\( a \equiv b \mod n \Longrightarrow \left( a \over n \right) = \left( b \over n \right) \)
                        </li>
                        <li>\( \left( 1 \over n \right) = 1 \)</li>
                        <li>\( \left( -1 \over n \right) = (-1)^{\frac{(n-1)}{2}} \)</li>
                        <li>\( \left( 2 \over n \right) = (-1)^{\frac{(n^2-1)}{8}} \)</li>
                        <li>\( \left( m \over n \right) = \left( n \over m \right) (-1)^{\frac{(m-1)(n-1)}{4}} \)</li>
                    </ul>
                    Z własności symbolu Jacobiego wynika, że jeżeli \(n\) nieparzyste oraz \(a\) nieparzyste
                    i w postaci \( a = 2^ea_1 \), gdzie \(a_1\) też nieparzyste to:
                    $$
                    \bigg( \frac{a}{n} \bigg) = \left( 2^e \over n \right)  \bigg( \frac{a_1}{n} \bigg) =
                    \left( 2 \over n \right)^e \left( \frac{n \mod a_1}{a_1} \right) (-1)^{\frac{(a_1-1)(n-1)}{4}}
                    $$
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton11" onclick="showCommentInput('11')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification11" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com11" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText11"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('11')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments11list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <strong>Algorytm obliczania symbolu Jacobiego \( \left( a \over n \right) \) (i Legendre'a)</strong>
                    dla
                    nieparzyetej
                    liczby całkowitej \( n \geqslant 3 \) oraz całkowitego \( 0 \leqslant a < n \) \( \texttt{JACOBI \(
                    (a, n) \)} \)
                    <ol type="a">
                        <li>\( \texttt{ If \( a = 0 \) then return \(0\) } \)</li>
                        <li>\( \texttt{ If \( a = 1 \) then return \(1\) } \)</li>
                        <li>\( \texttt{ Write \( a = w^e a_1 \), gdzie \( a_1 \) nieparzyste } \)</li>
                        <li>
                            \( \texttt{ If \(e\) parzyste set \( s \leftarrow 1 \) } \)<br>
                            \( \texttt{ Otherwise set \( s \leftarrow 1 \) if \( n \equiv 1 \text{ or } 7 \mod 8 \), }
                            \)<br>
                            \( \texttt{ or set \( s \leftarrow -1 \) if \( n \equiv 3 \text{ or } 5 \mod 8 \) } \)
                        </li>
                        <li>\( \texttt{ If \( n \equiv 3 \mod 4 \) and \( a_1 \equiv 3 \mod 4 \) then set \( s \leftarrow -s
                            \)
                            } \)
                        </li>
                        <li>\( \texttt{ Set \( n_1 \leftarrow n \mod a_1 \) } \)</li>
                        <li>
                            \( \texttt{ If \( a_1 = 1 \) then return s } \)<br>
                            \( \texttt{ Otherwise return \( s\cdot\)JACOBI\( (n_1, a) \) } \)
                        </li>
                    </ol>
                    Algorytm działa w czasie \( \mathcal{O}((\lg n)^2) \) operacji bitowych.
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton12" onclick="showCommentInput('12')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification12" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com12" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText12"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('12')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments12list">

            </div>
        </div>

    </div>
@endsection
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

  function showCommentInput(inputName) {
    console.log(inputName)
    document.getElementById('commentButton' + inputName).style = "display: none"
    document.getElementById('com' + inputName).style = "display: block"

  }

  function addComment(categoryId) {
    let text = document.getElementById('commentText' + categoryId).value
    axios.post('/comment', {
      categoryID: categoryId,
      commentText: text
    }).then((result) => {
      document.getElementById('commentNotification'+categoryId).style = "display:block"
      setTimeout(function(){
        window.location.href = "/"

      } , 2000);
    }).catch(function (error) {
      console.log(error)
    }).finally(() => {
      document.getElementById('commentButton' + categoryId).style = "display: block"
      document.getElementById('com' + categoryId).style = "display: none"
    });
  }

  function createComments(commentText, userLogin, commentDivName){
    var article = document.createElement('article')
    article.className = 'media'
    var mediaLeft = document.createElement('figure')
    mediaLeft.className = "media-left"
    var imgP = document.createElement('p')
    imgP.className = "image is-48x48"
    var img = document.createElement('img');
    img.src = "/img/user_icon.png"
    imgP.appendChild(img)
    mediaLeft.appendChild(imgP)
    article.appendChild(mediaLeft)
    var mediaContent = document.createElement('div')
    mediaContent.className = "media-content"
    var content = document.createElement('div')
    content.className = "content"
    var p = document.createElement('p')
    var br = document.createElement('br')
    var strong = document.createElement('strong')
    var span = document.createElement('span')
    strong.innerText = userLogin
    p.appendChild(strong)
    p.appendChild(br)
    span.innerText = commentText
    p.appendChild(span)
    content.appendChild(p)
    mediaContent.appendChild(content)
    article.appendChild(mediaContent)
    document.getElementsByClassName('comments' +commentDivName+ 'list')[0].appendChild(article)
  }

  function fillComments(sectionId){
    axios.get('/getComments', {
      params: {
        categoryID: sectionId,
      }
    }).then((result) => {
      comments = result.data.comments
      for(let comment of comments){
        createComments(comment.comment, comment.login, sectionId)
      }
    }).catch(function (error) {
      console.log(error)
    })
  }

  window.onload = function() {
    for (let i=4 ; i<13; i++){
      fillComments(i)
    }
  };

  </script>

