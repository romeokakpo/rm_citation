@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Abonnés</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
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
              <div class="alert alert-success alert-dismissible d-none" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Suppression réussie !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger alert-dismissible d-none" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Abonné non supprimé : Une erreur s'est produite !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
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
                  @php
                    $IDs = '';
                  @endphp
                  @foreach ($newsletters as $newsletter)
                    <tr class="del-{{ $newsletter->id }}">
                      <td>{{ $newsletter->id }}</td>
                      <td> <a href="mailto://{{ $newsletter->email }}">{{ $newsletter->email }}</a></td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#del-news-{{ $newsletter->id }}"
                          class="btn btn-danger" type="submit"><i class="bi bi-trash"></i>
                        </button>
                        <div class="modal fade" id="del-news-{{ $newsletter->id }}" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Supprimer un abonné</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                <p>Adresse: <a href="mailto:{{ $newsletter->email }}">{{ $newsletter->email }}</a></p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                  id="del-{{ $newsletter->id }}">Supprimer</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @php
                      $IDs .= $newsletter->id . ',';
                    @endphp
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

      await fetch("{{ route('newsletter.del') }}", options)
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
      $('#del-' + el).click(() => {
        request_del(el);
      })
    });
  </script>
@endsection
