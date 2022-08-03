@extends('template')
@section('title')
    Partenaires
@endsection
@section('main')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Mes partenaires</h2>
        <div class="row row-bottom-padded-md">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <img class="img-responsive" src="images/img_bg_1.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="fh5co-heading">MTN BENIN</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row row-bottom-padded-md">
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <img class="img-responsive" src="images/img_bg_1.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
            </div>
            <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="fh5co-heading">MOOV AFRICA</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
                <form method="POST" action="{{route('patner.post')}}">
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