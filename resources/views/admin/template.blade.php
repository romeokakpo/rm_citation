<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RM Citations Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  @yield('styles')
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('admin.home') }}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">R💕M💕 Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            @php
              $countnotif = \App\Models\Notification::where('lu', 0)->count();
            @endphp
            @if ($countnotif)
              <span class="badge bg-primary badge-number">{{ $countnotif }}</span>
            @endif

          </a><!-- End Notiication Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              @if ($countnotif)
                Vous avez + {{ $countnotif }} abonnements...
                <a href="{{ route('notifications.all') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Marquer
                    comme
                    lu</span></a>
              @else
                Pas de nouvelles notifications
              @endif
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @php
              $nonlu = \App\Models\Notification::where('lu', 0)
                  ->latest('id')
                  ->paginate(5)
                  ->all();
            @endphp
            @foreach ($nonlu as $notif)
              <li class="message-item">
                <a href="#">
                  <div>
                    <p>{{ $notif->description }}</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach
            <li class="dropdown-footer">
              <a href="{{ route('notifications.all') }}">Afficher tous les abonnés</a>
            </li>
          </ul>
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            @php
              $countmsg = \App\Models\Message::where('lu', 0)->count();
            @endphp
            @if ($countmsg)
              <span class="badge bg-success badge-number">{{ $countmsg }}</span>
            @endif

          </a><!-- End Messages Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              @if ($countmsg)
                Vous avez {{ $countmsg }} message(s) non lu
                <a href="{{ route('inbox.all') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Marquer comme
                    lu</span></a>
              @else
                Pas de nouveaux messages
              @endif

            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @php
              $nonlu = \App\Models\Message::where('lu', 0)
                  ->latest('id')
                  ->paginate(5)
                  ->all();
              $IDs = '';
            @endphp
            @foreach ($nonlu as $message)
              <li class="message-item" id="ID-{{ $message->id }}">
                <a href="#" data-swal-template="#msg-id-{{ $message->id }}">
                  <div>
                    <h4>{{ $message->email }}</h4>
                    <p>{{ substr($message->message, 0, 50) }}... <br>
                      <small>{{ 'Envoyé le ' . $message->created_at->format('d-m-Y') . ' à ' . $message->created_at->format('H:i') . ' GMT + 1' }}</small>
                    </p>
                  </div>
                </a>
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
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @php
                $IDs .= $message->id . ',';
              @endphp
            @endforeach
            <li class="dropdown-footer">
              <a href="{{ route('admin.home') }}#messages">Afficher tous les messages</a>
            </li>
          </ul><!-- End Messages Dropdown Items -->
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">R. Miracle</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Romaindo Miracle</h6>
              <span>Administrateur</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profil') }}">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profil') }}">
                <i class="bi bi-gear"></i>
                <span>Paramètres</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ URL::current() != route('admin.home') ? 'collapsed' : '' }}"
          href="{{ route('admin.home') }}">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ strpos(\Request::route()->getName(), 'citations') === 0 ? '' : 'collapsed' }}"
          data-bs-target="#citations-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-double-quotes-r"></i><span>Citations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="citations-nav"
          class="nav-content collapse {{ strpos(\Request::route()->getName(), 'citations') === 0 ? 'show' : '' }}"
          data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('citations.index') }}"
              class="{{ URL::current() == route('citations.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Mes citations</span>
            </a>
            <a href="{{ route('citations.create') }}"
              class="{{ URL::current() == route('citations.create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ajouter une citation</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ strpos(\Request::route()->getName(), 'musiques') === 0 ? '' : 'collapsed' }}"
          data-bs-target="#musiques-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-music-2-line"></i><span>Musiques</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="musiques-nav"
          class="nav-content collapse {{ strpos(\Request::route()->getName(), 'musiques') === 0 ? 'show' : '' }}"
          data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('musiques.index') }}"
              class="{{ URL::current() == route('musiques.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Mes musiques</span>
            </a>
            <a href="{{ route('musiques.create') }}"
              class="{{ URL::current() == route('musiques.create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ajouter une musique</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ strpos(\Request::route()->getName(), 'videos') === 0 ? '' : 'collapsed' }}"
          data-bs-target="#videos-nav" data-bs-toggle="collapse" href="#">
          <i class="ri ri-video-line"></i><span>Vidéos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="videos-nav"
          class="nav-content collapse {{ strpos(\Request::route()->getName(), 'videos') === 0 ? 'show' : '' }}"
          data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('videos.index') }}"
              class="{{ URL::current() == route('videos.index') ? 'active' : '' }}">
              <i class="ri bi-circle"></i><span>Mes vidéos</span>
            </a>
            <a href="{{ route('videos.create') }}"
              class="{{ URL::current() == route('videos.create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ajouter une vidéo</span>
            </a>
          </li>
        </ul>
      </li>

      <!--<li class="nav-item">
        <a class="nav-link {{ strpos(\Request::route()->getName(), 'partenaires') === 0 ? '' : 'collapsed' }}"
          data-bs-target="#parter-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Partenaires</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="parter-nav"
          class="nav-content collapse {{ strpos(\Request::route()->getName(), 'partenaires') === 0 ? 'show' : '' }}"
          data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('partenaires.index') }}"
              class="{{ URL::current() == route('partenaires.index') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Mes partenaires</span>
            </a>
            <a href="{{ route('partenaires.create') }}"
              class="{{ URL::current() == route('partenaires.create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ajouter un partenaire</span>
            </a>
          </li>
        </ul>
      </li>-->

      <li class="nav-item">
        <a class="nav-link icon {{ URL::current() != route('newsletters.list') ? 'collapsed' : '' }}"
          href="{{ route('newsletters.list') }}">
          <i class="bx bxs-contact"></i>
          <span>Abonnés</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ URL::current() != route('admin.profil') ? 'collapsed' : '' }}"
          href="{{ route('admin.profil') }}">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  @yield('main')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>RM Admin</span></strong>. All Rights Reserved
    </div>
    <!--<div class="credits">
      <!-- All the links in the footer should remain intact.
      <!-- You can delete the links only if you purchased the pro version.
      <!-- Licensing information: https://bootstrapmade.com/license/
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>-->
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script>
    Swal.bindClickHandler();

    let token = document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");

    let request = async (id) => {
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

      await fetch("{{ route('inbox.one') }}", options)
        .then((response) => response.json())
        .then((response) => {})
        .catch(() => {});
    }

    let IDs = [{{ $IDs }}];
    IDs.forEach(el => {
      $('#ID-' + el).click(() => {
        request(el);
      })
    });
  </script>
  @yield('script')
</body>

</html>
