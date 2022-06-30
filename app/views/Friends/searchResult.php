<?php if($data['result'] != null) {?>
    <?php foreach($data['result'] as $friend) : ?>
        <div class="card">
            <img class="profile_pictures"src="<?= BASEURL.$friend['img']; ?>" alt="">
            <div class="detail">
                <h2><?= $friend['first_name'] . ' ' . $friend['last_name'] ?></h2>
                <h3>Username : <?= $friend['username'] ?></h3>
                <button class="kirim-permintaan" value="<?= $friend['id'] ?>">Kirim Permintaan</button>
            </div>
        </div>
    <?php endforeach ?>
<?php } ?>