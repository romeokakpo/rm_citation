@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mes citations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
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
              <div class="alert alert-success alert-dismissible d-none" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Suppression réussie !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger alert-dismissible d-none" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Citation non supprimée : Une erreur s'est produite !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
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
                  @php
                    $IDs = '';
                  @endphp
                  @foreach ($citations as $citation)
                    <tr class="del-{{ $citation->id }}">
                      <td>{{ $citation->id }}</td>
                      <td><img width="100px" height="auto" style="cursor:pointer"
                          data-swal-template="#img-{{ $citation->id }}" src="{{ $citation->file }}"
                          alt="{{ $citation->texte }}">
                        <template id="img-{{ $citation->id }}">
                          <swal-image src="{{ $citation->file }}" width="auto" height="auto"
                            alt="{{ $citation->texte }}" />
                          <swal-param name="allowEscapeKey" value="false" />
                          <swal-param name="customClass" value='{ "popup": "my-popup" }' />
                        </template>
                      </td>
                      <td>{{ $citation->download }}</td>
                      <td>{{ $citation->created_at->format('d-m-Y') }}</td>
                      <td>
                        <button data-bs-toggle="modal" data-bs-target="#del-cit-{{ $citation->id }}"
                          class="btn btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        <div class="modal fade" id="del-cit-{{ $citation->id }}" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Supprimer une citation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                <img width="100%" height="auto" style="cursor:pointer"
                                  data-swal-template="#img-{{ $citation->id }}" src="{{ $citation->file }}"
                                  alt="{{ $citation->texte }}">
                                <p>{{ $citation->texte }}</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a href="#"><button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                    id="del-{{ $citation->id }}">Supprimer</button></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @php
                      $IDs .= $citation->id . ',';
                    @endphp
                  @endforeach
                </tbody>
              </table>
              <div class="alert alert-success alert-dismissible d-none" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                Suppression réussie !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <div class="alert alert-danger alert-dismissible d-none" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Citation non supprimée : Une erreur s'est produite !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
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

      await fetch("{{ route('citation.del') }}", options)
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
            console.log(response);
            $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
            $('.alert.alert-danger.alert-dismissible').addClass('fade show');
            /*setTimeout(() => {
              $('.alert.alert-danger.alert-dismissible').removeClass('fade show');
              $('.alert.alert-danger.alert-dismissible').addClass('d-none');
            }, 2000);*/
          }
        })
        .catch(() => {
          $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
          $('.alert.alert-danger.alert-dismissible').addClass('fade show');
          /*setTimeout(() => {
            $('.alert.alert-danger.alert-dismissible').removeClass('fade show');
            $('.alert.alert-danger.alert-dismissible').addClass('d-none');
          }, 2000);*/
        });
    }

    values.forEach(el => {
      $('#del-' + el).click(() => {
        request_del(el);
      })
    });
  </script>
@endsection
