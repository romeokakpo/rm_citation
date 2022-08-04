@extends('admin.template')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Abonnés</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Accueil</a></li>
        <li class="breadcrumb-item active">Abonnés</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Mes abonnés</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if (!$newsletters->count())
                    <tr style="text-align: center">
                      <td colspan="5">Aucun abonné...</td>
                    </tr>
                  @endif
                  @foreach ($newsletters as $newsletter)
                    <tr>
                      <td>{{ $newsletter->id }}</td>
                      <td> <a href="mailto://{{ $newsletter->email }}">{{ $newsletter->email }}</a></td>
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