(function ($) {
  $(document).ready(function(){
    
	// Close button for Drupal messages
	$(".alert .close").click(function(e) {
		e.preventDefault();
	    $(this).parent().fadeOut('slow');
	});	

	// Clear input field value on focus and restore if no value was entered
	$('input[type="text"],input[type="email"]').focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});

  });
}(jQuery));