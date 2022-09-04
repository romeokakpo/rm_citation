@extends('admin.template')

@section('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/dropify.min.css') }}">
@endsection
@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter une citation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item">Citations</li>
          <li class="breadcrumb-item active">Ajouter une citation</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter une citation</h5>
              <div class="alert alert-success alert-dismissible d-none" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Ajout réussie !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger alert-dismissible d-none" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Citation non ajoutée : Une erreur s'est produite !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <!-- General Form Elements -->
              <form enctype="multipart/form-data" action="{{ route('citations.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-4 col-form-label">Choisir la citation</label>
                  <div class="col-sm-8">
                    <input name="image" class="form-control dropify" required type="file" id="formFile"
                      accept="image/png, image/jpeg" data-allowed-file-extensions="png jpg">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Texte sur la citation(facultatif)</label>
                  <div class="col-sm-8">
                    <textarea name='texte' class="form-control" style="height: 100px"
                      placeholder="Ce texte doit être le texte présent sur l'image. Il aide les personnes non voyante à lire le texte présent sur la photo grâce à un lecteur d'écran.">{{ old('texte') }}</textarea>
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck2" checked name="today">
                  <label class="form-check-label" for="gridCheck2">
                    Marquer comme citation du jour
                  </label>
                </div>
                <div class="row mb-3 justify-content-center">
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary px-5">Publier</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

      </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
@section('script')
  <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
  <script>
    $(document).ready(() => {
      $('.dropify').dropify({
        messages: {
          default: 'Glissez-déposez un fichier ici ou cliquez',
          replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
          remove: 'Supprimer',
          error: 'Désolé, le fichier trop volumineux'
        }
      })
      @if (Session::get('success'))
        $('.alert.alert-success.alert-dismissible').removeClass('d-none');
        $('.alert.alert-success.alert-dismissible').addClass('fade show');
      @endif
      @if (Session::get('error'))
        $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
        $('.alert.alert-danger.alert-dismissible').addClass('fade show');
      @endif
    })
  </script>
@endsection
