@extends('template')
@section('title')
    Me Contacter
@endsection
@section('main')
<div id="fh5co-main">
    <div class="fh5co-more-contact">
        <div class="fh5co-narrow-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-mail"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="mailto://">romeokakpo3@gmail.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="fh5co-text">
                            <p>Bidossesi, Abomey-Calabi Bénin</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fh5co-feature fh5co-feature-sm animate-box" data-animate-effect="fadeInLeft">
                        <div class="fh5co-icon">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="fh5co-text">
                            <p><a href="tel://+22991985934">+229 91 98 59 34</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fh5co-narrow-content animate-box" data-animate-effect="fadeInLeft">
        
        <div class="row">
            <div class="col-md-4">
                <h2>Me contacter</h2>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Pseudo">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Téléphone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-md" value="Envoyer le message">
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </form>
    </div>	
</div>
</div>
@endsection