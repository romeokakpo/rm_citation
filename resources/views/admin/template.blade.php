<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

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
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

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
                <a href="{{ route('inbox') }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Tout voir</span></a>
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
            @endphp
            @foreach ($nonlu as $message)
              <li class="message-item">
                <a href="{{ route('read_msg', $message->id) }}">
                  <div>
                    <h4>{{ $message->email }}</h4>
                    <p>{{ substr($message->message, 0, 50) }}...</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endforeach
            <li class="dropdown-footer">
              <a href="{{ route('inbox') }}">Afficher tous les messages</a>
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
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profil')}}">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('admin.profil')}}">
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
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
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
            <a href="{{ route('videos.index') }}" class="{{ URL::current() == route('videos.index') ? 'active' : '' }}">
              <i class="ri bi-circle"></i><span>Mes vidéos</span>
            </a>
            <a href="{{ route('videos.create') }}"
              class="{{ URL::current() == route('videos.create') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Ajouter une vidéo</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
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
      </li>

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
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/jquery-3.2.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
</body>

</html>
