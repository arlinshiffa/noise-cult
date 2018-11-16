jQuery( document ).ready( function($) {
    jQuery( "body" ).on( 'hover', '.cpm-framework-sortable-handle', function() {
        jQuery( 'ul.cpm-framework-sortable-list' ).sortable({
            handle: '.cpm-framework-sortable-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.cpm-framework-sortable-item').trigger( 'change' );
            }
        });
    });

    /* On changing the value. */
    jQuery( "body" ).on( 'change', 'input.cpm-framework-sortable-item', function() {
        /* Get the value, and convert to string. */
        this_checkboxes_values = jQuery( this ).parents( 'ul.cpm-framework-sortable-list' ).find( 'input.cpm-framework-sortable-item' ).map( function() {
            return this.value;
        }).get().join( ',' );

        /* Add the value to hidden input. */
        jQuery( this ).parents( 'ul.cpm-framework-sortable-list' ).find( 'input.cpm-framework-sortable' ).val( this_checkboxes_values ).trigger( 'change' );

    });
});
