$( "#img" ).on( "change", ( event ) => {
    console.log( URL.createObjectURL( event.target.files[ 0 ] ) );
    $( ".display-img" ).fadeIn( "fast" ).attr( 'src', URL.createObjectURL( event.target.files[ 0 ] ) );
} );