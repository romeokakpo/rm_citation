@extends('template')
@section('title')
  Citations
@endsection
@section('main')
  <div id="fh5co-main">
    <div class="fh5co-narrow-content">
      <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Découvrez mes citations</h2>
      <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><small>La citation du jour</small></h2>
      <div class="row row-bottom-padded-md">
        <div class="col-md-4 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
          <div class="blog-entry">
            <img style="cursor:pointer" data-swal-template="#img-{{ $citation->id }}" src="{{ $citation->file }}"
              class="img-responsive" alt="{{ $citation->texte }}">
            <template id="img-{{ $citation->id }}">
              <swal-image src="{{ $citation->file }}" width="auto" height="auto" alt="{{ $citation->texte }}" />
              <swal-param name="allowEscapeKey" value="false" />
              <swal-param name="customClass" value='{ "popup": "my-popup" }' />
            </template>
            <div class="stat" style="text-align: right; padding-top:5px">
              <span class="pl-2 telech" style="cursor: pointer"><i class="bi bi-download"></i> Télécharger</span>
              <a data-url="{{ route('download') }}" data-id="{{ $citation->id }}" download
                href="{{ asset($citation->file) }}"></a><br>
            </div>
          </div>
        </div>
      </div>
      <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"><small>Jours précédents</small></h2>
      <div class="row row-bottom-padded-md">
        @foreach ($citations as $citation)
          <div class="col-md-4 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
            <div class="blog-entry">
              <img style="cursor:pointer" data-swal-template="#img-{{ $citation->id }}" src="{{ $citation->file }}"
                class="img-responsive" alt="{{ $citation->texte }}">
              <template id="img-{{ $citation->id }}">
                <swal-image src="{{ $citation->file }}" width="auto" height="auto" alt="{{ $citation->texte }}" />
                <swal-param name="allowEscapeKey" value="false" />
                <swal-param name="customClass" value='{ "popup": "my-popup" }' />
              </template>
              <div class="stat" style="text-align: right; padding-top:5px">
                <span class="pl-2 telech" style="cursor: pointer"><i class="bi bi-download"></i> Télécharger</span>
                <a data-url="{{ route('download') }}" data-id="{{ $citation->id }}" download
                  href="{{ asset($citation->file) }}"></a><br>
              </div>
              <span class="pl-2"><small style="font-size: 0.99rem;">Publié le
                  {{ $citation->created_at->format('d-m-Y') }}</small></span>
            </div>
          </div>
        @endforeach
        <nav aria-label="..." style="margin-top:5px;clear:both">
          <ul class="pager">
            <li class="previous {{ $n == 1 ? 'disabled' : '' }}"><a href="{{ route('citations', $n - 1) }}"><span
                  aria-hidden="true">&larr;</span> Précédent</a>
            </li>
            <li class="next {{ $n == $all ? 'disabled' : '' }}"><a href="{{ route('citations', $n + 1) }}">Plus de
                citations...
                <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
        </nav>
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
            <form method="POST" action="{{ route('citations.post') }}">
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
  <div class="notification-follow">
    Abonnement réussi !
  </div>
  <div class="notification error">
    Une erreur s'est produite !
  </div>
  <div class="notification wait">
    Votre téléchargement va démmarré dans un instant...
  </div>
  @if (session()->has('success'))
    <script>
      document.querySelector('.notification-follow').style.display = "block";
      document.querySelector('.notification-follow').style.transition = "3s";
      setTimeout(() => {
        document.querySelector('.notification-follow').style.display = "none";
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
