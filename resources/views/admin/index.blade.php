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
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Musiques</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-music-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $musiques }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Videos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri ri-video-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $videos }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Recent Sales -->
            <div class="col-12" id="messages">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Messages récents</h5>
                  <div class="alert alert-success alert-dismissible d-none" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    Message supprimé !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <div class="alert alert-danger alert-dismissible d-none" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    Message non supprimé : Une erreur s'est produite !
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <table class="table table-borderless datatable">
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
                      @php
                        $IDs = '';
                      @endphp
                      @foreach ($messages as $message)
                        <tr class="del-{{ $message->id }}"
                          @if ($message->lu == 0) style="background-color:rgba(50,50,255,0.1)" @endif>
                          <td>{{ $message->id }}</td>
                          <td> <a href="mailto://{{ $message->email }}">{{ $message->email }}</a></td>
                          <td>{{ $message->numero }}</td>
                          <td>{{ substr($message->message, 0, 15) }}...
                            <a href="#" data-swal-template="#msg-id-{{ $message->id }}"><span
                                id="read-{{ $message->id }}"> Lire</span></a>
                            <template id="msg-id-{{ $message->id }}">
                              @if ($message->pseudo === 'Non défini')
                                <swal-title>Message d'un visiteur</swal-title>
                              @else
                                <swal-title>Message de {{ $message->pseudo }}</swal-title>
                              @endif

                              <swal-html>
                                <p>Adresse: <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                                <p>
                                  Contenu: <br>
                                  <hr>
                                  {{ $message->message }}
                                </p>
                                <hr>
                              </swal-html>
                              <swal-footer>
                                {{ 'Envoyé le ' . $message->created_at->format('d-m-Y') . ' à ' . $message->created_at->format('H:i') . ' GMT + 1' }}
                              </swal-footer>
                            </template>
                          </td>
                          <td>
                            <button data-bs-toggle="modal" data-bs-target="#del-msg-{{ $message->id }}"
                              class="btn btn-danger" type="submit">
                              <i class="bi bi-trash"></i>
                            </button>
                            <div class="modal fade" id="del-msg-{{ $message->id }}" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Supprimer ce message ?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body text-center">
                                    <p>Adresse: <a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                                    <p>
                                      Contenu: <br>
                                      <hr>
                                      {{ substr($message->message, 0, 150) }}...
                                    </p>
                                    <hr>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                      id="del-{{ $message->id }}">Supprimer</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @php
                          $IDs .= $message->id . ',';
                        @endphp
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
@section('script')
  <script>
    let values = [{{ $IDs }}];

    let request_del = async (id) => {
      var options = {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json, text-plain, */*",
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token,
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
          id: id
        }),
      };

      await fetch("{{ route('inbox.del') }}", options)
        .then((response) => response.json())
        .then((response) => {
          if (response.success) {
            $('.alert.alert-success.alert-dismissible').removeClass('d-none');
            $('.alert.alert-success.alert-dismissible').addClass('fade show');
            setTimeout(() => {
              $('.alert.alert-success.alert-dismissible').removeClass('fade show');
              $('.alert.alert-success.alert-dismissible').addClass('d-none');
            }, 2000);
            $('.del-' + id).remove();
          } else {
            $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
            $('.alert.alert-danger.alert-dismissible').addClass('fade show');
            setTimeout(() => {
              $('.alert.alert-danger.alert-dismissible').removeClass('fade show');
              $('.alert.alert-danger.alert-dismissible').addClass('d-none');
            }, 2000);
          }
        })
        .catch(() => {
          $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
          $('.alert.alert-danger.alert-dismissible').addClass('fade show');
          setTimeout(() => {
            $('.alert.alert-danger.alert-dismissible').removeClass('fade show');
            $('.alert.alert-danger.alert-dismissible').addClass('d-none');
          }, 2000);
        });
    }
    values.forEach(el => {
      $('#read-' + el).click(() => {
        request(el);
      })
    });
    values.forEach(el => {
      $('#del-' + el).click(() => {
        request_del(el);
      })
    });
  </script>
@endsection
