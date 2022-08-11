@extends('admin.template')

@section('main')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Profil</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.profil') }}">Accueil</a></li>
        <li class="breadcrumb-item active">Profil</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>Romaindo Miracle</h2>
            <h3>Administrateur</h3>
            <div class="social-links mt-2">
              <a href="{{ $user->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ $user->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{ $user->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le Profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer mot de
                  passe</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Détails du profil</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Adresse</div>
                  <div class="col-lg-9 col-md-8">{{ $user->adresse }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Téléphone</div>
                  <div class="col-lg-9 col-md-8">{{ $user->telephone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" action="{{ route('profile') }}">
                  @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profil Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="/assets/img/profile-img.jpg" alt="Profile">

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Adresse</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="adresse" type="text" class="form-control" id="Address" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telephone" type="text" class="form-control" id="Phone" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Profil Twitter</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Profil Facebook</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="Facebook" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Profil Instagram</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram" required>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                  </div>
                </form><!-- End Profile Edit Form -->
              
                
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="{{ route('password') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewPassword" type="password" class="form-control" id="renewPassword" required>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Appliquer</button>
                  </div>
                </form><!-- End Change Password Form -->
                
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection