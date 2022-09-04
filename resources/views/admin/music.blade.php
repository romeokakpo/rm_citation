@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mes musiques</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item">Musiques</li>
          <li class="breadcrumb-item active">Mes musiques</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          Bientôt Disponible :)
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
