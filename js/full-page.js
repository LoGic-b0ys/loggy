$( document ).ready( function() {

  //Animation Rotate Declaration
  $.fn.animateRotate = function( angle, duration, easing, complete ) {
    var args = $.speed( duration, easing, complete );
    var step = args.step;
    return this.each( function( i, e ) {
      args.complete = $.proxy( args.complete, e );
      args.step = function( now ) {
        $.style( e, 'transform', 'rotate(' + now + 'deg)' );
        if ( step ) return step.apply( e, arguments );
      };
      $( {
        deg: 0
      } ).animate( {
        deg: angle
      }, args );
    } );
  };

  //declaration to full page the content
  $( ".main-content" ).css( "height", "100vh" );
  $( ".main-content" ).css( "width", "100%" );

  //link click event
  $( ".item-click" ).on( "click", function(e) {

    e.preventDefault();

    //declaration to catch the slider information
    //and transfer it to our new full page
    var src = $(this).parent().parent().parent().find('img').attr('src');
    var iconClass = $(this).parent().parent().parent().find('.sale-bacth i').attr('class');
    var title = $(this).text();
    var cat = $(this).parent().parent().find('span').eq(0).text();
    var author = $(this).parent().parent().find('span').eq(1).text();
    var authorSrc = $(this).parent().parent().find('img').attr('src');
    var desc = $(this).parent().parent().find('p').text();
    var ajaxTarget = $(this).data('target');

    //fade the best seller and change the color to blue
    $( ".best-seller" ).fadeOut();
    $( ".main-content" ).css( "background-color", "#00b4ff" );

    //shrink the content and rotate it
    $( ".main-content" ).animate( {
      width: "25px",
      height: "375px"
    }, function() {
      $( this ).animateRotate( 90 );
    } );

    //fade the content
    setTimeout( function() {
      $( ".main-content" ).fadeOut();
    }, 1500 );

    //begin ajax here
    $('.content').load(ajaxTarget);

          //change the new page DOM
          setTimeout( function() {

            //rotate the
            $( ".page-content" ).animateRotate( 0, 0 );
            $( ".page-content" ).css( "height", "25px" );
            $( ".page-content" ).css( "width", "375px" );
            $( ".page-content" ).css( "background-color", "#00b4ff" );
            $( ".page-content" ).fadeIn();

            $( ".page-content" ).animate( {
              backgroundColor: "#515151"
            }, function() {
              $( this ).animate( {
                height: "100vh"
              }, function() {
                $( this ).animate( {
                  width: "100%"
                }, function() {
                  $( ".nextcontent" ).fadeIn( 300 );
                } );
              } );
            } );

            setTimeout( function() {
              $( '.page-content' ).css( "background-color", "white" );
              $('.page-wrapper .side img').attr('src', src);
              $('.page-content h1').text(title);
              $('.page-content .tags').text(cat);
              $('.page-content p.desc').text(desc);
              $('.page-content .post-label i').attr('class', iconClass);
              $( '.page-wrapper' ).fadeIn();
            }, 1500 );

            //get back the navigation off-canvas event
            $( '#menu-corner' ).removeClass( 'toggle-site-menu' );
            $( '#menu-corner' ).addClass( 'toggle-back' );
            $( '#menu-corner' ).find( '.fa' ).removeClass( 'fa-navicon' ).addClass( 'fa-angle-double-left' );
          }, 800 );
  } );

  $( document ).on( 'click', '.toggle-back', function() {
    $( ".page-wrapper" ).fadeOut();
    $( ".page-content" ).css( "background-color", "#00b4ff" );

    $( ".page-content" ).animate( {
      width: "25px",
      height: "375px"
    }, function() {
      $( this ).animateRotate( -90 );
    } );

    setTimeout( function() {
      $( ".page-content" ).fadeOut();
    }, 1500 );

    setTimeout( function() {
      $( ".main-content" ).animateRotate( 0, 0 );
      $( ".main-content" ).css( "height", "25px" );
      $( ".main-content" ).css( "width", "375px" );
      $( ".main-content" ).fadeIn();

      $( ".main-content" ).animate( {
        height: "100vh"
      }, function() {
        $( this ).animate( {
          width: "100%"
        }, function() {
          $( '.main-content' ).css( "background-color", "white" );
          $( ".best-seller" ).fadeIn( 300 );
        } );
      } );
      
      $( '#menu-corner' ).removeClass( 'toggle-back' );
      $( '#menu-corner' ).addClass( 'toggle-site-menu' );
      $( '#menu-corner' ).find( '.fa' ).removeClass( 'fa-angle-double-left' ).addClass( 'fa-navicon' );
    }, 1400 );
  } );
} );