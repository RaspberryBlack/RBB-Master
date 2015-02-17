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
	
	
// ----------------------------------------------------------------------------
  $(document).ready(function(){
    
	// Close button for Drupal messages
	$(".alert .close").click(function(e) {
		e.preventDefault();
	    $(this).parent().fadeOut('slow');
	});	

	// Clear input field value on focus and restore if no value was entered
	$('input[type="text"],input[type="email"]').focus(function() {
		if( this.value === this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
  
  // responsive navigation
  var nav = responsiveNav("#main-menu", {
	   label: "☰ <span>Menu</span>"
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