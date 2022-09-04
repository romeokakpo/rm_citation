@extends('admin.template')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mes vidéos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item">Vidéos</li>
          <li class="breadcrumb-item active">Mes vidéos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div>
          <div class="alert alert-success alert-dismissible d-none" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            Suppression réussie !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="alert alert-danger alert-dismissible d-none" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            Vidéo non supprimée : Une erreur s'est produite !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <div class="row">
            @php
              $IDs = '';
            @endphp
            @foreach ($videos as $video)
              <div class="col-6 del-{{ $video->id }}">
                <iframe width="460" height="215" src="{{ $video->link }}" title="YouTube video player"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen></iframe>
                <div>
                  <button data-bs-toggle="modal" data-bs-target="#del-vid-{{ $video->id }}"
                    class="btn btn-danger">Supprimer</button>
                  <div class="modal fade" id="del-vid-{{ $video->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Supprimer une vidéo</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          Voulez-vous supprimer cette vidéo ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                            id="del-{{ $video->id }}">Supprimer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @php
                $IDs .= $video->id . ',';
              @endphp
            @endforeach
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

      await fetch("{{ route('video.del') }}", options)
        .then((response) => response.json())
        .then((response) => {
          if (response.success) {
            $('.alert.alert-success.alert-dismissible').removeClass('d-none');
            $('.alert.alert-success.alert-dismissible').addClass('fade show');
            $('.del-' + id).remove();
          } else {
            $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
            $('.alert.alert-danger.alert-dismissible').addClass('fade show');
          }
        })
        .catch(() => {
          $('.alert.alert-danger.alert-dismissible').removeClass('d-none');
          $('.alert.alert-danger.alert-dismissible').addClass('fade show');
        });
    }

    values.forEach(el => {
      $('#del-' + el).click(() => {
        request_del(el);
      })
    });
  </script>
@endsection
