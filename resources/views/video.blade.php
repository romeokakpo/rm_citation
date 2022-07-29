@extends('template')
@section('title')
    Vidéos
@endsection
@section('main')
<div id="fh5co-main">
    <div class="fh5co-narrow-content">
        <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Mes vidéos</h2>
        <div class="row row-bottom-padded-md">
            <div class="col-sm-4 col-md-6">
                <iframe width="460" height="215" src="https://www.youtube.com/embed/XYlFnYwlNCU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-sm-4 col-md-6">
                <iframe width="460" height="215" src="https://www.youtube.com/embed/_QnU6wU4fAE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email">
                        <input type="submit" style="margin-top: 5px" class="btn btn-primary btn-md" value="S'abonner">
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>
</div>
@endsection