(function( $ ) {

    'use strict';
    
    /*
    Dialog with CSS animation
    */
    theme.fn.execOnceTroughEvent( $('.popup-with-zoom-anim'), 'mouseover.trigger.zoom.lightbox', function(){
        $(this).magnificPopup({
            type: 'inline',
    
            fixedContentPos: false,
            fixedBgPos: true,
    
            overflowY: 'auto',
    
            closeBtnInside: true,
            preloader: false,
    
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
    });
    
    theme.fn.execOnceTroughEvent( $('.popup-with-move-anim'), 'mouseover.trigger.slide.lightbox', function(){
        $(this).magnificPopup({
            type: 'inline',
    
            fixedContentPos: false,
            fixedBgPos: true,
    
            overflowY: 'auto',
    
            closeBtnInside: true,
            preloader: false,
    
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });
    });
    
    
    
    
    }).apply( this, [ jQuery ]);