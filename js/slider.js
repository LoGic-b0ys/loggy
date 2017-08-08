jQuery( document ).ready(function( $ ) {
"use strict"
    
    // Best Seller Slider
    if (jQuery(".best-seller-slider").length != '') {
        jQuery('.best-seller-slider').owlCarousel({
            loop:false,
            margin:30,
            nav:true,
            dots: false,
            smartSpeed:600,
            responsiveClass:true,
            responsive:{
                0:{ items:1},
                320:{ items:1},
                480:{ items:2},
                640:{ items:2},
                768:{ items:2},
                800:{ items:2},
                960:{ items:3},
                991:{ items:2},
                1024:{ items:3},
                1199:{ items:3},
                1200:{ items:4}
            }
        })
    }

})