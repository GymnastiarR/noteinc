
$( document ).ready( function () {
    $( 'nav' ).on( 'click', ( e ) => {
        if ( e.target.className == 'tambah-teman' ) {
            $.get( BASEURL + "friends/addFriendsPage", ( data ) => {
                $( '.content' ).html( data );
            } );
        }

        if ( e.target.className == 'list-teman' ) {
            $.get( BASEURL + "friends/friendList", ( data ) => {
                $( '.content' ).html( data );
            } );
        }
    } );

    $( 'main' ).on( 'click', ( e ) => {
        if ( e.target.className == 'terima-permintaan' ) {
            $.get( BASEURL + `friends/addFriend/${e.target.value}` );

            $.get( BASEURL + `friends/deleteFriendRequest/${e.target.value}`, ( data ) => {
                $( '.content' ).html( data );
            } );
        }

        if ( e.target.className == 'hapus-teman' ) {
            $.post( BASEURL + `friends/getFriend`, { id: e.target.value } ).done( ( data ) => {
                $.post( BASEURL + `friends/deleteFriend`, { value: data } ).done( ( hasil ) => {
                    $( '.content' ).html( hasil );
                } );
            } );
        }

        if ( e.target.className == 'kirim-permintaan' ) {
            $.get( BASEURL + `friends/request/${e.target.value}`, ( data ) => {
                $( '.content' ).html( data );
            } );
        }

        if ( e.target.className == 'cancel-request' ) {
            $.get( BASEURL + `friends/deleteFriendRequest/${e.target.value}`, ( data ) => {
                e.target.parentElement.parentElement.classList.add( 'hide' );
                setTimeout( () => {
                    e.target.parentElement.parentElement.remove();
                    console.log( document.querySelector( '.pertemanan-diminta section' ).innerText );
                    if ( document.querySelector( '.pertemanan-diminta section' ).innerText == '' ) {
                        console.log( "here" );
                        document.querySelector( '.pertemanan-diminta section' ).innerHTML = `
                        <div class="kosong">
                            <h2>Tidak Permintaan Pertemanan Diminta</h2>
                        </div>`;
                    }
                }, 1000 );
            } );
        }


    } );

    $( 'main' ).on( 'keyup', ( e ) => {
        if ( e.target.className == 'input-cari-teman' ) {
            if ( e.target.value != '' ) {
                $.post( BASEURL + `friends/searchFriends/`, { keyword: e.target.value } ).done( ( data ) => {
                    $( '.hasil-pencarian' ).html( data );
                } );
            }
        }
    } );
} );
