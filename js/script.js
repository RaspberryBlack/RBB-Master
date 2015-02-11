(function ($) {
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