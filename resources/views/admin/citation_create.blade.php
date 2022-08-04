@extends('admin.template')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Ajouter une citation</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
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
            <!-- General Form Elements -->
            <form>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-4 col-form-label">Choisir la citation</label>
                <div class="col-sm-8">
                  <input class="form-control" required type="file" id="formFile" accept="image/png, image/jpeg">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-4 col-form-label">Texte sur la citation(facultatif)</label>
                <div class="col-sm-8">
                  <textarea class="form-control" style="height: 100px" placeholder="Ce texte doit être le texte présent sur l'image. Il aide les personnes non voyante à lire le texte présent sur la photo grâce à un lecteur d'écran."></textarea>
                </div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                <label class="form-check-label" for="gridCheck2">
                  Citation du jour ?
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