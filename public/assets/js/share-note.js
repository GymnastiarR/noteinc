$( '#kirim-note' ).on( 'click', () => {
    $.get( BASEURL + 'sharenote/send', function ( data ) {
        $( '.content' ).html( data );
    } );
} );

$( '#note-anda' ).on( 'click', () => {
    $.get( BASEURL + 'sharenote/pendingNote', function ( data ) {
        $( '.content' ).html( data );
    } );
} );

$( '.content' ).on( 'click', ( e ) => {
    if ( e.target.className == 'pilih' ) {
        if ( e.target.parentElement.parentElement.getAttribute( 'id' ) == undefined ) {
            e.target.parentElement.parentElement.setAttribute( 'id', 'select' );
            e.target.nextElementSibling.setAttribute( 'checked', 'true' );
        }
        else {
            e.target.parentElement.parentElement.removeAttribute( 'id' );
            e.target.nextElementSibling.removeAttribute( 'checked' );
        }
    }

    if ( e.target.className == 'next' ) {
        const sign = document.querySelectorAll( '.sign' );
        let catatan = [];
        sign.forEach( ( e ) => {
            if ( e.hasAttribute( 'checked' ) ) {
                catatan.push( e.value );
            }
            console.log( catatan );
        } );

        $.post( BASEURL + 'sharenote/listnote', { id: JSON.stringify( catatan ) } ).done( function ( data ) {
            $( '.container' ).html( data );
        } );

    }

    if ( e.target.className == 'select' ) {
        console.log( "Here" );
        if ( !e.target.nextElementSibling.hasAttribute( 'checked' ) ) {
            e.target.nextElementSibling.setAttribute( 'checked', 'true' );
            e.target.parentElement.setAttribute( 'id', 'select' );
            e.target.innerHTML = 'Batalkan Pilihan';
        }
        else {
            e.target.nextElementSibling.removeAttribute( 'checked' );
            e.target.parentElement.removeAttribute( 'id' );
            e.target.innerHTML = 'Pilih Catatan';
        }
    }

    if ( e.target.className == 'send-request' ) {
        const notes = document.querySelectorAll( '.note-sign' );
        let id_notes = [];
        notes.forEach( ( e ) => {
            if ( e.hasAttribute( 'checked' ) ) {
                id_notes.push( e.value );
            }
        } );

        const sign = document.querySelectorAll( '.friend-sign' );
        let id_friends = [];

        sign.forEach( ( e ) => {
            id_friends.push( e.value );
        } );

        $.post( BASEURL + 'sharenote/sendNote', { notes: JSON.stringify( id_notes ), friends: JSON.stringify( id_friends ) } ).done( function ( data ) {
            $( '.content' ).html( data );
        } );
    }

    if ( e.target.className == 'save-note' ) {
        $.post( BASEURL + 'sharenote/saveNote', { id_note: e.target.value, id: e.target.nextElementSibling.value } ).done( function ( data ) {
            $( '.content' ).html( data );
        } );
    }

} );

// $('.next').on('click', ()=>{
// });