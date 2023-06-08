<div class="cari-teman">
    <h1>Cari Teman</h1>
    <input type="search" class="input-cari-teman" placeholder="Cari Teman">
    <div class="hasil-pencarian">

    </div>
</div>

<div class="pertemanan-diminta">
    <h1>Pertemanan Diminta</h1>
    <section class="friends send">
        <?php if ($data['send'] != null) { ?>
            <?php foreach ($data['send'] as $person) : ?>
                <div class="card">
                    <img src="<?= BASEURL . $person['img'] ?>" alt="">
                    <div class="detail">
                        <h2><?= $person['first_name'] . ' ' . $person['last_name'] ?></h2>
                        <h3>Username : <?= $person['username'] ?></h3>
                        <p class="date">Tanggal Diminta : <?= $person['date'] ?></p>
                        <button class="cancel-request" value="<?= $person['id'] ?>">Batalkan Permintaan</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="kosong">
                <h2>Tidak Permintaan Pertemanan Diminta</h2>
            </div>
        <?php } ?>
    </section>
</div>

<div class="pertemanan-diminta">
    <h1>Permintaan Pertemanan</h1>
    <section class="friends receive">
        <?php if ($data['receive'] != null) { ?>
            <?php $i = 100;
            foreach ($data['receive'] as $person) : ?>
                <div class="card" style="animation-delay:<?php echo $i;
                                                            $i += 100 ?>">
                    <img src="<?= BASEURL . $person['img'] ?>" alt="">
                    <div class="detail">
                        <h2><?= $person['first_name'] . ' ' . $person['last_name'] ?></h2>
                        <h3><?= $person['username'] ?></h3>
                        <p class="date">Tanggal Diminta : <?= $person['date'] ?></p>
                        <button type="button" class="terima-permintaan" value="<?= $person['id']; ?>">Terima Permintaan</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="kosong">
                <h2>Kamu Tidak Memiliki Permintaan Pertemanan</h2>
            </div>
        <?php } ?>
    </section>
</div>