@extends('template')
@section('title')
    Musiques
@endsection
@section('main')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Ma musique</h2>
        <div class="row row-bottom-padded-md">
            <div class="col-md-4 col-sm-6 col-padding text-center animate-box">
                <div class="work" style="background-image: url(images/img-2.jpg);">
                    <div class="music-player">
                        <div class="audio-player">
                            <div class="icon-container">
                              <svg xmlns="http://www.w3.org/2000/svg" class="audio-icon" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                              </svg>
                                 <audio src="zapsplat.mp3"></audio>
                            </div>
                            <div class="controls">
                                <button class="player-button">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    <div class="fh5co-narrow-content">
        <div class="row">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <h1 class="fh5co-heading-colored">Recevoir les nouveautés</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                <p class="fh5co-lead">Vous désirez recevoir mes nouvelles publications en temps réels ?</p>
                <form method="POST" action="{{route('musiques.post')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" required name="email" class="form-control" placeholder="Email">
                        <input type="submit" style="margin-top: 5px" class="btn btn-primary btn-md" value="S'abonner">
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
<div class="notification">
    Abonnement réussi !
  </div>
  @if(session()->has('success'))
    <script>
        document.querySelector('.notification').style.display = "block";
        document.querySelector('.notification').style.transition = "3s";
        setTimeout(() => {
            document.querySelector('.notification').style.display = "none";
        }, 3000);
    </script>
  @endif
</div>
@endsection