@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter une vidéo</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item">Vidéos</li>
          <li class="breadcrumb-item active">Ajouter une vidéo</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-8w">
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
          <div class="small text-secondary mb-3">Le lien doit être sous la forme:
            https://www.youtube.com/embed/-wARK0r9LBY
          </div>
          <form action="{{ route('videos.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="link" class="col-4 form-label">Lien de la vidéo</label>
              <div class="col-8">
                <input placeholder="Lien de la vidéo" name="link" type="text" class="form-control" id="link"
                  required>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
          </form>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
@section('script')
  <script>
    @if (Session::get('success'))
      $('.alert.alert-success.alert-dismissible').removeClass('d-none');
      $('.alert.alert-success.alert-dismissible').addClass('fade show');
    @endif
    @if (Session::get('error'))
      $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
      $('.alert.alert-danger.alert-dismissible').addClass('fade show');
    @endif
  </script>
@endsection
