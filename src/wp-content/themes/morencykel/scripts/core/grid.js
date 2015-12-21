( function( $, window, document, undefined ){

	$( document ).keypress( function( event ){

		var code = event.keyCode || event.which;

		if( code === 12 ){

			if( $( '.grid' ).is( ':visible' )){

				$( '.grid' ).css({ 'display': 'none' });

			} else {

				$( '.grid' ).css({ 'display': 'block' });
			}
		}   				
	});
	
})( jQuery, this, this.document );