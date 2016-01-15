(function ($) {
  $(document).ready(function(){
    
	// Close button for Drupal messages
	$(".callout .close-button").click(function(e) {
		e.preventDefault();
	    $(this).parent().fadeOut();
	});	

	// Mobile Menu
	$('.menu-open, .menu-close').click(function(e) {
		e.preventDefault();
		$('header .navigation').toggleClass('open');
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