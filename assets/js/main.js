(function($) {
    "use strict";
  
    const $documentOn = $(document);
    const $windowOn = $(window);
  
    $documentOn.ready( function() {
  
   
    
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "1199",
        meanExpand: ['<i class="far fa-plus"></i>'],
    });
    
  

      $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
        $(".offcanvas__info").removeClass("info-open");
        $(".offcanvas__overlay").removeClass("overlay-open");
      });
      $(".sidebar__toggle").on("click", function () {
        $(".offcanvas__info").addClass("info-open");
        $(".offcanvas__overlay").addClass("overlay-open");
      });
      
  

      $(".body-overlay").on("click", function () {
        $(".offcanvas__area").removeClass("offcanvas-opened");
        $(".df-search-area").removeClass("opened");
        $(".body-overlay").removeClass("opened");
      });
  
   

      $windowOn.on("scroll", function () {
        if ($(this).scrollTop() > 250) {
          $("#header-sticky").addClass("sticky");
        } else {
          $("#header-sticky").removeClass("sticky");
        }
      });      


      $(".img-popup").magnificPopup({
        type: "image",
        gallery: {
          enabled: true,
        },
      });

      $(".video-popup").magnificPopup({
        type: "iframe",
        callbacks: {},
      });
  
    

      $(".pp-count").counterUp({
        delay: 15,
        time: 4000,
      });
  


      new WOW().init();
  


    if ($('.single-select').length) {
        $('.single-select').niceSelect();
    }

    



    if ($('.pp-brand-slider').length > 0) {
      const ppBrandSlider = new Swiper(".pp-brand-slider", {
        spaceBetween: 100,
        speed: 2000,
        loop: true,
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        breakpoints: {
          1199: {
            slidesPerView: 5,
          },
          991: {
            slidesPerView: 4,
          },
          767: {
            slidesPerView: 3,
          },
          575: {
            slidesPerView: 2,
          },
          0: {
            slidesPerView: 1,
          },
        },
      });
    }


    if ($('.pp-testimonial-slider').length > 0) {
      const PpTestimonialSlider = new Swiper(".pp-testimonial-slider", {
        spaceBetween: 100,
        speed: 2000,
        loop: true,
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
         navigation: {
          prevEl: '.array-next',
          nextEl: '.array-prev',
        },
        breakpoints: {
          1199: {
            slidesPerView: 2,
          },
          991: {
            slidesPerView: 2,
          },
          767: {
            slidesPerView: 1,
          },
          575: {
            slidesPerView: 1,
          },
          0: {
            slidesPerView: 1,
          },
        },
      });
    }
  
    if ($('.pp-testimonial-slider-2').length > 0) {
      const PpTestimonialSlider2 = new Swiper(".pp-testimonial-slider-2", {
        spaceBetween: 100,
        speed: 2000,
        loop: true,
        autoplay: {
          delay: 1000,
          disableOnInteraction: false,
        },
        breakpoints: {
          1199: {
            slidesPerView: 1,
          },
          991: {
            slidesPerView: 1,
          },
          767: {
            slidesPerView: 1,
          },
          575: {
            slidesPerView: 1,
          },
          0: {
            slidesPerView: 1,
          },
        },
      });
    }

     //>> Instagram Slider Start <<//
        
      if($('.pp-instagram-banner-slider').length > 0) {
          const PpInstagramBannerSlider = new Swiper(".pp-instagram-banner-slider", {
              spaceBetween: 30,
              speed: 2000,
              loop: true,
              autoplay: {
                  delay: 2000,
                  disableOnInteraction: false,
              },
              breakpoints: {
                  1399: {
                      slidesPerView: 5,
                  },
                  1199: {
                      slidesPerView: 5,
                  },
                  991: {
                      slidesPerView: 4,
                  },
                  767: {
                      slidesPerView: 3,
                  },
                  650: {
                      slidesPerView: 2,
                  },
                  575: {
                      slidesPerView: 1,
                  },
                  0: {
                      slidesPerView: 1,
                  },
              },
          });
      }

       //>> Testimonial Slider Start <<//
        if($('.pp-testimonial-slider-3').length > 0) {
            const PpTestimonialSlider3 = new Swiper(".pp-testimonial-slider-3", {
                spaceBetween: 20,
                speed: 3000,
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".dot",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 3,
                    },
                    991: {
                        slidesPerView: 2,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }



        if ($('.parallaxie').length && $(window).width() > 991) {
            if ($(window).width() > 768) {
                $('.parallaxie').parallaxie({
                    speed: 0.55,
                    offset: 0,
                });
            }
        }
        



    if ($(".mouseCursor").length > 0) {
        function itCursor() {
            var myCursor = jQuery(".mouseCursor");
            if (myCursor.length) {
                if ($("body")) {
                    const e = document.querySelector(".cursor-inner"),
                        t = document.querySelector(".cursor-outer");
                    let n,
                        i = 0,
                        o = !1;
                    (window.onmousemove = function(s) {
                        o ||
                            (t.style.transform =
                                "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                            (e.style.transform =
                                "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                            (n = s.clientY),
                            (i = s.clientX);
                    }),
                    $("body").on(
                            "mouseenter",
                            "button, a, .cursor-pointer",
                            function() {
                                e.classList.add("cursor-hover"),
                                    t.classList.add("cursor-hover");
                            }
                        ),
                        $("body").on(
                            "mouseleave",
                            "button, a, .cursor-pointer",
                            function() {
                                ($(this).is("a", "button") &&
                                    $(this).closest(".cursor-pointer").length) ||
                                (e.classList.remove("cursor-hover"),
                                    t.classList.remove("cursor-hover"));
                            }
                        ),
                        (e.style.visibility = "visible"),
                        (t.style.visibility = "visible");
                }
            }
        }
        itCursor();
      }
  


    if ($(".search-toggler").length) {
        $(".search-toggler").on("click", function(e) {
            e.preventDefault();
            $(".search-popup").toggleClass("active");
            $("body").toggleClass("locked");
        });
    }





    $windowOn.on('scroll', function() {
        if ($(this).scrollTop() > 20) {
            $("#pp-back-top").addClass("show");
        } else {
            $("#pp-back-top").removeClass("show");
        }
    });
    
    $documentOn.on('click', '#pp-back-top', function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });



    
    });

    function loader() {
        $(window).on('load', function() {
            
            $(".preloader").addClass('loaded');                    
            $(".preloader").delay(600).fadeOut();                       
        });
    }

    loader();

  
  })(jQuery); 

// Cookie Consent Banner
(function() {
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
  }
  document.addEventListener('DOMContentLoaded', function() {
    var banner = document.getElementById('cookie-consent-banner');
    if (!banner) return;
    if (getCookie('cookie_consent') === 'accepted') {
      banner.style.display = 'none';
    } else {
      banner.style.display = 'block';
      document.getElementById('cookie-accept-btn').onclick = function() {
        setCookie('cookie_consent', 'accepted', 365);
        banner.style.display = 'none';
      };
    }
  });
})();