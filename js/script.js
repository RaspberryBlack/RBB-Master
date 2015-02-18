(function ($) {
	
	/// doubleTapToGo by Osvaldas Valutis, www.osvaldas.info, Available for use under the MIT License
	$.fn.doubleTapToGo = function( params )
	{
		if( !( 'ontouchstart' in window ) &&
			!navigator.msMaxTouchPoints &&
			!navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

		this.each( function()
		{
			var curItem = false;

			$( this ).on( 'click', function( e )
			{
				var item = $( this );
				if( item[ 0 ] != curItem[ 0 ] )
				{
					e.preventDefault();
					curItem = item;
				}
			});

			$( document ).on( 'click touchstart MSPointerDown', function( e )
			{
				var resetItem = true,
					parents	  = $( e.target ).parents();

				for( var i = 0; i < parents.length; i++ )
					if( parents[ i ] == curItem[ 0 ] )
						resetItem = false;

				if( resetItem )
					curItem = false;
			});
		});
		return this;
	};
	
	// window resize end event
	$(window).bind('resize', function(e) {
    window.resizeEvt;
    $(window).resize(function() {
        clearTimeout(window.resizeEvt);
        window.resizeEvt = setTimeout(function() {
           
					$(window).trigger('EndOfResize');
           
        }, 500);
    });
	});
	
// ----------------------------------------------------------------------------
  $(document).ready(function(){
    
	// Close button for Drupal messages
	$(".alert .close").click(function(e) {
		e.preventDefault();
	    $(this).parent().fadeOut('slow');
	});	
  
  
  // Mobile Menu
	$('.menu-open, .menu-close').click(function(e) {
		e.preventDefault();
		$('header .navigation').toggleClass('open');
	});
  
  // touch friendly navigation
  $( '.menu-name-main-menu li:has(ul)' ).doubleTapToGo();
	
	
	// let placeholders disappear on focus
	$('input, textarea').each(function(){
    var $this = $(this);
    $this.data('placeholder', $this.attr('placeholder'))
         .focus(function(){$this.removeAttr('placeholder');})
         .blur(function(){$this.attr('placeholder', $this.data('placeholder'));});
	});
	
	
	// rearrange search & social icons on mobile
	$('#block-search-form').clone().attr('block-search-form','block-search-form-2').appendTo('#block-menu-block-1 .menu-block-1');
	$('#social-icons-block').clone().attr('social-icons-block','social-icons-block-2').appendTo('#block-menu-block-1 .menu-block-1');
		
	// at the end of every resize, check if we're in mobile layout
	/*
$(window).on('EndOfResize', function(e){
		
		if( // we're mobile either menu-open or -close is visible
			$('.menu-open').css('display') != 'none' ||
			$('.menu-close').css('display') != 'none'
		) {
			// if we haven't moved it already
			if( movingContent.parent('.region-sidebar-second') ){
				movingContent.appendTo('#block-menu-block-1 .menu-block-1 > ul');
				//nav.resize();
			}
		
		} else { // if desktop
			// if we need to move it back
			if( movingContent.parent('#block-menu-block-1 .menu-block-1') ){
				movingContent.prependTo('.region-sidebar-second');
			}
				
		}
	});
*/

	
	// Slick slider
	$('.region-preface').slick({
		slidesToShow: 3,	
  	responsive: [
	  	{
		  	breakpoint: 730,
		  	settings: {
			  	slidesToShow: 1,
			  	autoplay: true,
			  	dots: true,
			  	infinite: false	
			  }
	  	}
	  	
  	]  
  });
  
  
  // add qTips to lexicon terms
	$('.lexicon-term').click(function(e){
  	e.preventDefault();
  }).each(function() {
		
		var href = $(this).attr('href');
		var text = $(this).text();
		
		$(this).qtip({
			show: {
	      event: 'click mouseenter'
	    },
	    hide: {
	    	delay: 1000,
        fixed: true
	    },
	    position: {
        my: 'bottom center',  // Position my top left...
        at: 'top center',
        viewport: $('.page'),
        adjust: {
          method: 'shift'
        }
	    },
	    content: {
		    title: '<a href="'+href+'">'+text+' » </a>'
	    }
		});  
	  
  });
	
  });
}(jQuery));