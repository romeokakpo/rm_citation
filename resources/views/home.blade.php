@extends('template')
@section('title')
  Acceuil
@endsection
@section('main')
  <div id="fh5co-main">
    <aside id="fh5co-hero" class="js-fullheight">
      <div class="flexslider js-fullheight">
        <ul class="slides">
          <li style="background-image: url(images/img_bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                  <div class="slider-text-inner">
                    <h1>Salut ! Je suis <strong>Romaindo Miracle</strong></h1>

                  </div>
                </div>
              </div>
          </li>
          <li style="background-image: url(images/img_bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                  <div class="slider-text-inner">
                    <h1>Artiste muscienne, écrivain,gymnaste...</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li style="background-image: url(images/img_bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                  <div class="slider-text-inner">
                    <h1>et environnementaliste en formation.</h1>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>
    <div class="fh5co-narrow-content">
      <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">L'auteure</h2>
      <p class="biographie">
        Romaindo Miracle de son vrai nom Romaine MAHULIKPONTO est né le 29 février 2004 à Godomey en République du Bénin.
        C'est une artiste musicienne ayant déjà deux albums à son actif et ayant fait deux concerts (live et play back).
        Elle est également écrivain, Championne en titre en gymnastique rythmique et environnementaliste en formation.
        <br><br>
        À l'âge de 9 ans, elle participe au concours Podium vacances où elle remporta la couronne de Miss, la première
        place en poésie et en musique.
        <br><br>
        Elle commence à écrire ses premières citations à 14 ans et puis à l'âge de 16 ans elle commença leurs
        publications.
        <br>
        Romaine MAHULIKPONTO a été donatrices dans des orphelinats et écoles de sourds et muets. Romaindo Miracle est
        passionnée de musique, sport, lecture, voyage.
        <br><br>
        Romaindo Miracle💕
      </p>
    </div>
    <div class="fh5co-narrow-content">
      <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Citations récentes</h2>
      <div class="row row-bottom-padded-md">
        @foreach ($citations as $citation)
          <div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
            <div class="blog-entry">
              <img style="cursor:pointer" onclick="window.open(this.src, '_self');" src="{{ $citation->file }}"
                class="img-responsive" alt="{{ $citation->texte }}">
              <div class="stat" style="text-align: right; padding-top:5px">
                <span class="pl-2" style="cursor: pointer"> <i class="bi bi-heart"></i> {{ $citation->like }}</span>
                <span class="pl-2 telech"> <a data-id="{{$citation->id}}" download href="{{ $citation->file }}"><i
                      class="bi bi-download"></i>Téléch.</a></span><br>
              </div>

              <span class="pl-2"><small style="font-size: 0.99rem;">Publié le
                  {{ $citation->created_at->format('d-m-Y') }}</small></span>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div id="get-in-touch">
      <div class="fh5co-narrow-content">
        <div class="row">
          <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
            <h1 class="fh5co-heading-colored">Recevoir les nouveautés</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
            <p class="fh5co-lead">Vous désirez recevoir mes nouvelles publications en temps réels ?</p>
            <form method="POST" action="{{ route('home.post') }}">
              @csrf
              <div class="form-group">
                <input required type="text" name="email" class="form-control" placeholder="Email">
                <input type="submit" style="margin-top: 5px" class="btn btn-primary btn-md" value="S'abonner">
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="notification wait">
    Votre téléchargement va démmarré dans un instant...
  </div>
  <div class="notification">
    Abonnement réussi !
  </div>
  <div class="notification error">
    Une erreur s'est produite !
  </div>
  @if(session()->has('success'))
    <script>
        document.querySelector('.notification').style.display = "block";
        document.querySelector('.notification').style.transition = "3s";
        setTimeout(() => {
            document.querySelector('.notification').style.display = "none";
        }, 3000);
    </script>
  @endif
  @if (session()->has('error'))
  <script>
    document.querySelector('.notification.error').style.display = "block";
    document.querySelector('.notification.error').style.transition = "3s";
    setTimeout(() => {
      document.querySelector('.notification.error').style.display = "none";
    }, 3000);
  </script>
@endif
  </div>
@endsection
