;(function () {
	
	'use strict';



	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	var fullHeight = function() {

		if ( !isMobile.any() ) {
			$('.js-fullheight').css('height', $(window).height());
			$(window).resize(function(){
				$('.js-fullheight').css('height', $(window).height());
			});
		}

	};

	// Animations

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated');
							} else {
								el.addClass('fadeInUp animated');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var burgerMenu = function() {

		$('.js-fh5co-nav-toggle').on('click', function(event){
			event.preventDefault();
			var $this = $(this);

			if ($('body').hasClass('offcanvas')) {
				$this.removeClass('active');
				$('body').removeClass('offcanvas');	
			} else {
				$this.addClass('active');
				$('body').addClass('offcanvas');	
			}
		});



	};

	// Click outside of offcanvass
	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-aside, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
			
	    	}
	    	
	    }
		});

		$(window).scroll(function(){
			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
			
	    	}
		});

	};

	var sliderMain = function() {
		
	  	$('#fh5co-hero .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	};

	// Document on load.
	$(function(){
		fullHeight();
		contentWayPoint();
		burgerMenu();
		mobileMenuOutsideClick();
		sliderMain();

		//Téléchargement
		let url = "/user/register";
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    $(".register").submit((e) => {
        $(".register_btn").css("display", "none");
        $(".en_cours").css("display", "block").text("En cours...");
        /*Vérifier les valeurs ici
            pseudo: $(".pseudo").val(),
                email: $(".email").val(),
                matricule: parseInt($(".matricule").val()),
            }),
        */
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
                pseudo: $(".pseudo").val(),
                email: $(".email").val(),
                matricule: parseInt($(".matricule").val()),
            }),
        };

        fetch(url, options)
            .then((response) => response.json())
            .then((response) => {
                $(".en_cours").css("display", "none");
                if (response.success) {
                    $(".pseudo").val("");
                    $(".matricule").val("");
                    $(".text-danger.error").text("");
                    if (response.data.inscrit) {
                        $(".alogin").click();
                        $(".text-success.info").text(
                            "Vous possedez déjà un compte..."
                        );
                        $(".log_email").val($(".email").val());
                        $(".email").val("");
                        $(".register_btn").css("display", "block");
                    } else if (response.data.user) {
                        $(".email").val("");
                        $(".text-success.error")
                            .text(
                                "Consultez votre boîte mail pour recupérer vos identifiants de connexion."
                            )
                            .fadeIn();
                    }
                } else {
                    $(".text-success.error").text("");
                    $(".text-danger.error")
                        .text(
                            "Informations incorrectes ou vous n'êtes pas autorisé sur ce site..."
                        )
                        .fadeIn();
                    $(".register_btn").css("display", "block");
                }
            })
            .catch(() => {
                $(".en_cours").css("display", "none");
                $(".text-success.error").text("");
                $(".text-danger.error")
                    .text(
                        "Une erreur s'est produite,nous allons rechargez la page !"
                    )
                    .fadeIn();
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            });
        e.preventDefault();
    });


		//Like
	});


}());