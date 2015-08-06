/**
 * @file
 * Custom JavaScript file for Nerom theme.
 */
( function( $, window, document, undefined ){

	var archive_product = $( '.archive-product' ).get( 0 );
	if( archive_product ){

		$( '.container', archive_product ).masonry({

			percentPosition: true,
  			columnWidth: '.small',
  			itemSelector: '.shop-item',
  			transitionDuration: 0,
		});
	}

	$( document ).keypress( function( event ){

		var code = event.keyCode || event.which;
		if(code === 103) {

			$( 'body' ).toggleClass( 'grid' );
		}
	});

})( jQuery, this, this.document );