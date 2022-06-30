
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
        $.get(`http://localhost/Noted/public/friends/addFriend/${e.target.value}`)

        $.get(`http://localhost/Noted/public/friends/deleteFriendRequest/${e.target.value}`, (data)=>{
            $('.content').html(data);
        })
    }

    if(e.target.className == 'hapus-teman'){
        $.post(`http://localhost/Noted/public/friends/getFriend`, {id : e.target.value }).done((data)=>{
            $.post(`http://localhost/Noted/public/friends/deleteFriend`, {value : data}).done((hasil)=>{
                $('.content').html(hasil);
            })
        })
    }



    if(e.target.className == 'kirim-permintaan'){
        console.log("Here");
        $.get(`http://localhost/Noted/public/friends/request/${e.target.value}`, (data) => {
            $('.content').html(data);
        })
    }

});

$('input.input-cari-teman').on('keyup', (e) => {
    console.log("Here");
        $.post(`http://localhost/Noted/public/friends/searchFriends/`, { keyword : e.target.value}).done((data)=>{
            $('.hasil-pencarian').html(data);
        });
})