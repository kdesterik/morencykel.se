( function( $, window, document, undefined ){

	// Autofocus search-input on search-modal display
	$( '#search' ).on( 'shown.bs.modal', function(){

		$( '#search .search-form .search-field' ).val( '' );
  		$( '#search .search-form .search-field' ).focus();
	});

})( jQuery, this, this.document );