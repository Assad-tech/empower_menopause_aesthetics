$(document).ready(function(){
    if($('.logo-wrapper-carousel').length != 0){
        $('.logo-wrapper-carousel').owlCarousel({
            loop:true,
            margin:0,
            autoplay:true,
            autoplayTimeout:3000,
            responsiveClass:true,
            nav:false,
            dots:false,
            lazyLoad: true,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });
    }
    $(".lazyload").lazyload({effect : "fadeIn"});
    
    if($('.pkg_slider').length != 0){
        $('.pkg_slider').owlCarousel({
            loop:false,
            margin:0,
            autoplay:false,
            autoplayTimeout:6000,
            responsiveClass:true,
            lazyLoad: true,
            autoplayHoverPause:true,
            nav:true,
            navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }
    if($('.services_slider').length != 0){
        $('.services_slider').owlCarousel({
            loop:true,
            margin:30,
            center: true,
            autoplay:true,
            autoplayTimeout:3000,
            responsiveClass:true,
            lazyLoad: true,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
    }
    
    if($('.review-slider').length != 0){
        $('.review-slider').owlCarousel({
            loop:true,
            margin:30,
            center: true,
            lazyLoad: true,
            autoplay:true,
            autoplayTimeout:3000,
            responsiveClass:true,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    }
    
    if($('.process-slider').length != 0){
        $('.process-slider').owlCarousel({
            loop:true,
            margin:30,
            center: true,
            lazyLoad: true,
            autoplay:true,
            autoplayTimeout:3000,
            responsiveClass:true,
            nav:false,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }
    
    
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 500) {
            $("header").addClass("sticky");
        }else{
            $("header").removeClass("sticky");
        }
    });
    
})


document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    }    
    
    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});