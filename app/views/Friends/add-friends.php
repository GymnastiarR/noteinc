<div class="cari-teman">
    <input type="search">
</div>


<div class="pertemanan-diminta">
    <h1>Pertemanan Diminta</h1>
    <section class="friends">
        <?php foreach($data['send'] as $person) : ?>
            <div class="card">
                <img src="<?= BASEURL.$person['img'] ?>" alt="">
                <div class="detail">
                    <h2><?= $person['first_name'] . ' ' .$person['last_name'] ?></h2>
                    <h3>Username : <?= $person['username'] ?></h3>
                    <p><?= $person['sex'] ?></p>
                    <p class="date">Tanggal Diminta : <?= $person['date'] ?></p>
                    <button >Batalkan Permintaan</button>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>

<div class="pertemanan-diminta">
    <h1>Permintaan Pertemanan</h1>
    <section class="friends">
        <?php foreach($data['receive'] as $person) : ?>
            <div class="card">
                <img src="<?= BASEURL.$person['img'] ?>" alt="">
                <div class="detail">
                    <h2><?= $person['first_name'] . ' ' .$person['last_name'] ?></h2>
                    <h3><?= $person['username'] ?></h3>
                    <p><?= $person['sex'] ?></p>
                    <p class="date">Tanggal Diminta : <?= $person['date'] ?></p>
                    <button type="button" class="terima-permintaan" value="<?= $person['id']; ?>">Terima Permintaan</button>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>


