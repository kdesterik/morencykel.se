/**
 * @file
 * Custom JavaScript file for Nerom theme.
 */
( function( $, window, document, undefined ){

	// Autofocus on Search inputfield
	$( '#search' ).on( 'shown.bs.modal', function(){
		
		$( '#search .search-form .search-field' ).val( '' );
		$( '#search .search-form .search-field' ).focus();
	});

	// Enable Masonry on Shop page
	var archive_product = $( '.archive-product' ).get( 0 );
	if( archive_product ){

		$( '.container', archive_product ).masonry({

			percentPosition: true,
  			columnWidth: '.small',
  			itemSelector: '.shop-item',
  			transitionDuration: 0,
		});
	}

	// Display baseline grid on 'G' keypress
	$( document ).keypress( function( event ){

		var code = event.keyCode || event.which;
		if(code === 103) {

			$( 'body' ).toggleClass( 'grid' );
		}
	});

})( jQuery, this, this.document );