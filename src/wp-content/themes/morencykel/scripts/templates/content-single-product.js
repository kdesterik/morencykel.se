( function( $, window, document, undefined ){

	$( document ).ready( function(){

		var page = $( '.single-product' ).get( 0 );
		if( page ){

			$( '.product-zoom' ).each( function(){

				var image = $( this ).attr( 'data-target' );
							$( this ).zoom({ 'url': image, 'on': 'grab' });
			});
		}
	});

})( jQuery, this, this.document );