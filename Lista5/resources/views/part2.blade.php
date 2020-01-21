@extends('layouts.authUser')

@section('content')

    <h1 class="title">Schemat progowy \( (t, n) \) dzielenia sekretu Shamira</h1>
    <div class="main_page_context">
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Schemat progowy \( (t, n) \) dzielenia sekretu Shamira</strong></h3>
                    <strong>Cel:</strong> Zaufana Trzecia Strona \(T\) ma sekret \( S \geqslant 0 \), który chce
                    podzielić
                    pomiędzy \(n\) uczestników tak, aby dowolnych \(t\) spośród nich mogło sekret odtworzyć.<br>
                    <strong>Faza inicjalizacji:</strong>
                    <ul>
                        <li>\(T\) wybiera liczbę pierwszą \( p > \max(S, n) \) i definiuje \( a_0 = S \),</li>
                        <li>\(T\) wybiera losowo i niezależnie \( t-1) \) współczynników \( a_1, \dots ,a_{t-1} \in \
                            \mathbb{Z}_p
                            \),
                        </li>
                        <li>
                            \(T\) definiuje wielimian nad \( \mathbb{Z}_p \):
                            $$
                            f(x) = a_0 + \sum_{j=1}^{t-1}a_jx^j,
                            $$
                        </li>
                        <li>
                            Dla \( 1 \leqslant i \leqslant n \) Zaufana Trzecia Strona \(T\) wybiera losowo \( x_i \in
                            \mathbb{Z}_p
                            \),
                            oblicza: \( S_i = f(x_i) \mod p \) i bezpiecznie przekazuje parę \( (x_i, S_i) \)
                            użytkownikowi
                            \(P_i\).
                        </li>
                    </ul>
                    <strong>Faza łączenia udziałów w sekret:</strong> Dowolna grupa \(t\) lub więcej użytkowników łączy
                    swoje
                    udziały
                    \( -t \) różnych punktów \( (x_i, S_i) \) wielomianu \(f\) i dzięki interpolacji Lagrange'a
                    odzyskuje
                    sekret
                    \(
                    S = a_0 = f(0) \).<br><br>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton1" onclick="showCommentInput('1')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification1" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com1" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText1"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('1')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments1list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3><strong>Interpolacja Lagrange'a</strong></h3>
                    Mając dane \(t\) różnych punktów \( (x_i, y_i) \) nieznanego wielomianu \(f\) stopnia mniejszego od
                    \(t\)
                    możemy policzyć jego współczynniki korzystając ze wzoru:
                    $$
                    f(x) = \sum_{i=1}^{t} \left( y_i \prod_{1 \leqslant j \leqslant t, \, j \neq i} \frac{x - x_j}{x_i -
                    x_j}
                    \right)
                    \mod
                    p
                    $$
                    <strong>Wskazówka:</strong> w schemacie Shamira, aby odzyskać sekret \(S\), użytkownicy nie muszą
                    znać
                    całego
                    wielomianu \(f\). Wstawiając do wzoru na interpolację Lagrange'a \( x = 0 \), dostajemy wersję
                    uproszczoną,
                    ale wystarczającą aby policzyć sekret \(S = f(0) \):
                    $$
                    f(x) = \sum_{i = 1}{t} \left( y_i \prod_{1 \leqslant j \leqslant t, \, j \neq i} \frac{x_j}{x_i -
                    x_j}
                    \right)
                    \mod p
                    $$<br><br>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton2" onclick="showCommentInput('2')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>
            </article>
            <div class="notification is-success" id="commentNotification2" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com2" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">

                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText2"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('2')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments2list">

            </div>
        </div>

        <div class="box">
            <article class="media">
                <div class="media-content">
                    <h3>Przykład sekretu Shamira</h3>
                    <strong>Inicjalizacja: </strong>
                    Niech sekret \(S = 1234\).
                    Dzielimy go między 6 osób \(n=6\), z czego 3 będą mogły go zrekonstruować \(t=3\).
                    Losowo wybieramy \(t-1=2\) liczb: \(166 \text{ i } 94\).
                    Wygenerowany wielomian jest postaci:
                    $$
                    f(x) = 1234 + 166x +94x^2
                    $$

                    Wybieramy 6 punktów z wielomianu:
                    \((1,1494), (2,1942), (3,2578), (4,3402), (5,4414), (6, 5614)\)
                    <br>
                    <br>
                    <b>Łączenie udziałów: </b>
                    Z wcześniej wygenerowanych wybierzmy \(t\) punktów, np:
                    \((2,1942), (4,3402), (5,4414)\).<br>
                    Korzystamy ze wzoru:
                    $$
                    S = 1942\cdot \frac{4}{4-2} \cdot \frac{5}{5-2}
                    + 3402\cdot \frac{5}{5-4} \cdot \frac{2}{2-4}
                    + 4414\cdot \frac{2}{2-5} \cdot \frac{4}{4-5} = $$
                    $$= 1942 \cdot \frac{10}{3} + 3402 \cdot (-5) + 4414 \cdot \frac{8}{3}
                    = 1234
                    $$
                    <br><br>
                    @if(\Auth::user())
                        <div class="buttons has-addons is-right">
                            <button class="button is-primary" id="commentButton3" onclick="showCommentInput('3')">Dodaj
                                komentarz
                            </button>
                        </div>
                    @endif
                </div>

            </article>
            <div class="notification is-success" id="commentNotification3" style="display: none">
                Komentarz został dodany poprawnie
            </div>
            <div class="box comment_input" id="com3" style="display: none">
                <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="/img/comment_icon.png">
                        </figure>
                    </div>
                    <div class="media-content">

                        <div class="field">
                            <p class="control">
                                <textarea class="textarea" id="commentText3"
                                          placeholder="Dodaj komentarz..."></textarea>
                            </p>
                        </div>

                        <button class="button is-primary" onclick="addComment('3')">Dodaj</button>
                    </div>
                </article>
            </div>
            <div class="comments3list">

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
    fillComments(1)
    fillComments(2)
    fillComments(3)
  };

</script>


