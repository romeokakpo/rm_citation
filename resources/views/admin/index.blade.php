@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau de bord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Citations</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-double-quotes-r"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $citations }}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Téléchargements</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-download"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $download }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-12">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Likes reçu</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                      style="color: #ef5592; background:#ef559346">
                      <i class="bi bi-heart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $like }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Messages récents</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (!$messages->count())
                        <tr style="text-align: center">
                          <td colspan="5">Aucun message...</td>
                        </tr>
                      @endif
                      @foreach ($messages as $message)
                        <tr>
                          <td>{{ $message->id }}</td>
                          <td> <a href="mailto://{{ $message->email }}">{{ $message->email }}</a></td>
                          <td>{{ $message->numero }}</td>
                          <td>{{ $message->message }}</td>
                          <td><button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button> </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Activités récentes</h5>

              <div class="activity">
                @if (!$recents->count())
                  <div class="activity-item d-flex">
                    Aucune activé...
                  </div>
                @endif
                @foreach ($recents as $recent)
                  <div class="activity-item d-flex">
                    <div class="activite-label">32 min</div>
                    <i
                      class='bi bi-circle-fill activity-badge {{ $recent->type == 'success' ? 'text-success' : 'text-danger' }} align-self-start'></i>
                    <div class="activity-content">
                      {{ $recent->content }}
                    </div>
                  </div><!-- End activity item-->
                @endforeach
              </div>

            </div>
          </div><!-- End Recent Activity -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@endsection
