<main>
    <nav>
        <ul>
            <li class="list-teman">Daftar Teman</li>
            <li class="tambah-teman">Tambah Teman</li>
        </ul>
    </nav>
    <div class="content">
        <h1>Daftar Teman</h1>
        <section class="friends">
            <?php if($data['friends'] != null) { ?> 
                <?php foreach($data['friends'] as $friend) : ?>
                    <div class="card">
                        <img class="profile_pictures"src="<?= BASEURL.$friend['img']; ?>" alt="">
                        <div class="detail">
                            <h2><?= $friend['first_name'] . ' ' . $friend['last_name'] ?></h2>
                            <h3>Username : <?= $friend['username'] ?></h3>
                            <button type="button" class="hapus-teman" value="<?= $friend['id'] ?>">Hapus Pertemanan</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php }else {?>
                <div class="kosong">
                    <h2>Kamu Tidak Memiliki Teman</h2>
                </div>
            <?php } ?>
        </section>
    </div>
</main>
<script src="<?= BASEURL ?>/assets/js/friends.js"></script>