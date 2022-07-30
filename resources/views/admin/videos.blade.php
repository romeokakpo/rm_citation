@extends('admin.template')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mes vidéos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
        <li class="breadcrumb-item">Vidéos</li>
        <li class="breadcrumb-item active">Mes vidéos</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection