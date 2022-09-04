(function () {
    "use strict";

    var isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function () {
            return (
                isMobile.Android() ||
                isMobile.BlackBerry() ||
                isMobile.iOS() ||
                isMobile.Opera() ||
                isMobile.Windows()
            );
        },
    };

    var fullHeight = function () {
        if (!isMobile.any()) {
            $(".js-fullheight").css("height", $(window).height());
            $(window).resize(function () {
                $(".js-fullheight").css("height", $(window).height());
            });
        }
    };

    // Animations

    var contentWayPoint = function () {
        var i = 0;
        $(".animate-box").waypoint(
            function (direction) {
                if (
                    direction === "down" &&
                    !$(this.element).hasClass("animated")
                ) {
                    i++;

                    $(this.element).addClass("item-animate");
                    setTimeout(function () {
                        $("body .animate-box.item-animate").each(function (k) {
                            var el = $(this);
                            setTimeout(
                                function () {
                                    var effect = el.data("animate-effect");
                                    if (effect === "fadeIn") {
                                        el.addClass("fadeIn animated");
                                    } else if (effect === "fadeInLeft") {
                                        el.addClass("fadeInLeft animated");
                                    } else if (effect === "fadeInRight") {
                                        el.addClass("fadeInRight animated");
                                    } else {
                                        el.addClass("fadeInUp animated");
                                    }

                                    el.removeClass("item-animate");
                                },
                                k * 200,
                                "easeInOutExpo"
                            );
                        });
                    }, 100);
                }
            },
            { offset: "85%" }
        );
    };

    var burgerMenu = function () {
        $(".js-fh5co-nav-toggle").on("click", function (event) {
            event.preventDefault();
            var $this = $(this);

            if ($("body").hasClass("offcanvas")) {
                $this.removeClass("active");
                $("body").removeClass("offcanvas");
            } else {
                $this.addClass("active");
                $("body").addClass("offcanvas");
            }
        });
    };

    // Click outside of offcanvass
    var mobileMenuOutsideClick = function () {
        $(document).click(function (e) {
            var container = $("#fh5co-aside, .js-fh5co-nav-toggle");
            if (
                !container.is(e.target) &&
                container.has(e.target).length === 0
            ) {
                if ($("body").hasClass("offcanvas")) {
                    $("body").removeClass("offcanvas");
                    $(".js-fh5co-nav-toggle").removeClass("active");
                }
            }
        });

        $(window).scroll(function () {
            if ($("body").hasClass("offcanvas")) {
                $("body").removeClass("offcanvas");
                $(".js-fh5co-nav-toggle").removeClass("active");
            }
        });
    };

    var sliderMain = function () {
        $("#fh5co-hero .flexslider").flexslider({
            animation: "fade",
            slideshowSpeed: 5000,
            directionNav: true,
            start: function () {
                setTimeout(function () {
                    $(".slider-text").removeClass("animated fadeInUp");
                    $(".flex-active-slide")
                        .find(".slider-text")
                        .addClass("animated fadeInUp");
                }, 500);
            },
            before: function () {
                setTimeout(function () {
                    $(".slider-text").removeClass("animated fadeInUp");
                    $(".flex-active-slide")
                        .find(".slider-text")
                        .addClass("animated fadeInUp");
                }, 500);
            },
        });
    };

    // Document on load.
    $(function () {
        fullHeight();
        contentWayPoint();
        burgerMenu();
        mobileMenuOutsideClick();
        sliderMain();

        //Téléchargement
        let token = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");
        $(".telech").click((e) => {
            //Récupérer l'id
            document.querySelector(".notification.wait").style.display =
                "block";
            let id = e.target.nextElementSibling.dataset.id;
            let url = e.target.nextElementSibling.dataset.url;
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
                    id: Number(id),
                }),
            };
            function error() {
                document.querySelector(".notification.error").style.display =
                    "block";
                document.querySelector(".notification.error").style.transition =
                    "3s";
                setTimeout(() => {
                    document.querySelector(
                        ".notification.error"
                    ).style.display = "none";
                }, 3000);
            }

            fetch(url, options)
                .then((response) => response.json())
                .then((response) => {
                    //Success

                    if (response.success) {
                        e.target.nextElementSibling.click();
                        document.querySelector(
                            ".notification.wait"
                        ).style.display = "none";
                    } else {
                        console.log(response);
                        document.querySelector(
                            ".notification.wait"
                        ).style.display = "none";
                        error();
                    }
                })
                .catch((e) => {
                    document.querySelector(".notification.wait").style.display =
                        "none";
                    error();
                });
        });
        //Like
    });
})();
