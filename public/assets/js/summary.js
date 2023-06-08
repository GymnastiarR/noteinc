function editNote( id ) {
    document.location.assign( BASEURL + `summary/edit/${id}` );
}

const deleteNote = document.querySelector( '.delete-note' );
deleteNote.addEventListener( 'click', function ( e ) {

    const note = document.querySelectorAll( '.note' );
    note.forEach( function ( e ) {
        e.removeAttribute( 'onclick' );
    } );

    deleteNote.style.display = 'none';

    const sign = document.querySelectorAll( '.delete-sign' );
    sign.forEach( function ( e ) {
        e.style.display = 'block';
    } );

    const deleteAction = document.querySelector( '.delete-action' );
    deleteAction.style.display = 'block';

    const cancelDelete = document.querySelector( '.cancel-delete' );
    cancelDelete.style.display = 'block';

} );

function cancelDelete() {

    const note = document.querySelectorAll( '.note' );

    note.forEach( function ( e ) {
        e.setAttribute( 'onclick', `editNote(${e.getAttribute( 'id' )})` );
    } );

    const sign = document.querySelectorAll( '.delete-sign' );
    sign.forEach( function ( e ) {
        e.style.display = 'none';
    } );

    const deleteAction = document.querySelector( '.delete-action' );
    deleteAction.style.display = 'none';

    const cancelDelete = document.querySelector( '.cancel-delete' );
    cancelDelete.style.display = 'none';

    const deleteNote = document.querySelector( '.delete-note' );
    deleteNote.style.display = 'block';

}

function showDialog() {
    console.log( "Here" );
    const dialogForm = document.querySelector( '.new-note' );
    dialogForm.classList.remove( 'hide' );
    dialogForm.showModal();
}

$( '.cancel-save-note' ).on( 'click', function () {
    const dialogForm = document.querySelector( '.new-note' );
    dialogForm.classList.add( 'hide' );
    setTimeout( function () {
        dialogForm.close();
    }, 1000 );
} );


document.querySelectorAll( '.snippet' ).forEach( function ( e ) {
    let temp = e.textContent;
    if ( temp.length > 300 && window.innerWidth > 810 ) {
        temp = temp.substring( 0, 300 ) + '......';
        e.textContent = temp;
    }
    else {
        temp = temp.substring( 0, 150 ) + '......';
        e.textContent = temp;
    }
} );

window.addEventListener( "resize", function () {
    console.log( this.window.innerWidth );
    if ( window.innerWidth < 810 ) {
        snippet.forEach( function ( e ) {
            let temp = e.textContent;
            if ( temp.length > 200 ) {
                temp = temp.substring( 0, 150 ) + '......';
            }
            e.textContent = temp;
        } );

    } else if ( this.window.innerWidth >= 810 ) {
        snippet.forEach( function ( e ) {
            let temp = e.textContent;
            if ( temp.length > 400 ) {
                temp = temp.substring( 0, 400 ) + '......';
            }
            e.textContent = temp;
        } );
    }
} );


function checkList( e ) {
    console.log;
    let xhr = new XMLHttpRequest();
    const lists = document.querySelector( '.lists' );

    xhr.onreadystatechange = function () {
        console.log( xhr.readyState );

        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            lists.innerHTML = xhr.responseText;
        }

    };

    let name = e.target.getAttribute( 'name' );

    xhr.open( 'GET', BASEURL + `summary/checkList/${name}/${e.target.value}`, true );
    xhr.send();

}

function editItem( e ) {

    let name = e.target.getAttribute( 'name' );
    let value = e.target.innerText;
    const lists = document.querySelector( '.lists' );
    $.post( BASEURL + "summary/updateItem/", { id: name, isi: value } );

    // .done(function(data){
    //     lists.innerHTML = data;
    // });

}


window.addEventListener( "beforeunload", function ( event ) {
    event.window.confirm( "Simpan Perubahan ?" );
    // event.returnValue = function(){
    //     let name = e.target.getAttribute('name');
    //     let value = e.target.innerText;
    //     const lists = document.querySelector('.lists');
    //     $.post(BASEURL + "summary/updateItem/", {id : name, isi : value});
    // }
} );

function deleteList( e ) {

    const lists = document.querySelector( '.lists' );

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        console.log( xhr.readyState );

        if ( xhr.readyState == 4 && xhr.status == 200 ) {
            lists.innerHTML = xhr.responseText;
        }

    };

    let name = e.target.getAttribute( 'name' );
    console.log( e.target );

    xhr.open( 'GET', BASEURL + `summary/deleteList/${name}`, true );
    xhr.send();

}


document.querySelector( 'section.lists' ).addEventListener( 'click', function ( e ) {
    console.log( e.target.className );
    if ( e.target.className == 'list new-list-button' ) {
        document.querySelector( '.new-list-button' ).style.display = 'none';
        document.querySelector( '.new-list' ).style.display = 'block';
    }
} );

serialize = function ( obj ) {
    var str = [];
    for ( var p in obj )
        if ( obj.hasOwnProperty( p ) ) {
            str.push( encodeURIComponent( p ) + "=" + encodeURIComponent( obj[ p ] ) );
        }
    return str.join( "&" );
};


$( '.search' ).on( 'input', function ( e ) {

    if ( $( this ).val() == '' ) {

    }

    let data = $( this ).val();
    $.get( BASEURL + `summary/searchNote/${data}` ).done( function ( data ) {
        $( '.notes' ).html( data );
    } );
} );

$( 'section.lists' ).on( 'click', function ( e ) {


    if ( e.target.className == 'new-list-action' ) {
        $.post( BASEURL + "summary/newList", { content: $( '#new-list-input' ).val() } ).done( function ( data ) {
            const lists = document.querySelector( '.lists' );
            lists.innerHTML = data;
        } );
    }

    if ( e.target.className == 'new-item-button' ) {

        $.post( BASEURL + "summary/newItem", { id_list: e.target.value, content: e.target.previousElementSibling.value } ).done( function ( data ) {
            const lists = document.querySelector( '.lists' );
            lists.innerHTML = data;
        } );
    }

    if ( e.target.className == 'cancel-new-list' ) {
        $( '.new-list-button' ).show();
        $( '.new-list' ).hide();
    }

    if ( e.target.className == "fa-solid fa-trash" ) {
        console.log( e.target.className );
        $.post( BASEURL + "summary/deleteItem", { id_item: e.target.getAttribute( 'name' ) } ).done( function ( data ) {
            const lists = document.querySelector( '.lists' );
            lists.innerHTML = data;
        } );
    }


} )


