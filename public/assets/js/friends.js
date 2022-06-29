
$('nav').on('click', (e) =>{
    if(e.target.className == 'tambah-teman'){
        $.get("http://localhost/Noted/public/friends/addFriendsPage", (data)=>{
            $('.content').html(data);
        })
    }

    if(e.target.className == 'list-teman'){
        console.log("Here");
        $.get("http://localhost/Noted/public/friends/friendList", (data)=>{
            $('.content').html(data);
        })
    }
})

$('main').on('click', (e) => {
    if(e.target.className == 'terima-permintaan'){
        $.get(`http://localhost/Noted/public/friends/addFriend/${e.target.value}`, (data)=>{
            $('.content').html(data);
        })
    }

    if(e.target.className == 'hapus-teman'){

        $.get(`http://localhost/Noted/public/friends/deleteFriend/${e.target.value}`, (data)=>{
            $('.content').html(data);
        })
    }
})