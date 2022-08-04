@extends('admin.template')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mes citations</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
        <li class="breadcrumb-item">Citations</li>
        <li class="breadcrumb-item active">Mes citations</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card recent-sales overflow-auto">

          <div class="card-body">
            <h5 class="card-title">Mes Citations</h5>

            <table class="table table-borderless datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Preview</th>
                  <th scope="col">Télechargement</th>
                  <th scope="col">Publié le</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($citations as $citation)
                  <tr>
                    <td>{{ $citation->id }}</td>
                    <td><img width="100px" height="auto" style="cursor:pointer" onclick="window.open(this.src, '_self');" src="{{ $citation->file }}"
                       alt="{{ $citation->texte }}"></td>
                    <td>{{$citation->download}}</td>
                    <td>{{ $citation->created_at->format('d-m-Y')}}</td>
                    <td><button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button> </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection