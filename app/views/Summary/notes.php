<?php if ($data['notes'] != null) { ?>
    <div class="left">
        <?php for ($i = 0; $i < sizeof($data['notes']); $i += 2) : ?>
            <div class="note" id="<?= $data['notes'][$i]['id_note'] ?>" onclick="editNote(<?= $data['notes'][$i]['id_note'] ?>)">
                <input type="checkbox" style="display:none" class="delete-sign" name="<?= $i ?>" value="<?= $data['notes'][$i]['id_note'] ?>">
                <h2><?= $data['notes'][$i]['title'] ?></h2>
                <p class="snippet"><?= $data['notes'][$i]['content'] ?></p>
                <p><?= $data['notes'][$i]['tanggal_pembuatan'] ?></p>
            </div>
        <?php endfor ?>
    </div>
    <div class="right">
        <?php for ($i = 1; $i < sizeof($data['notes']); $i += 2) : ?>
            <div class="note" id="<?= $data['notes'][$i]['id_note'] ?>" onclick="editNote(<?= $data['notes'][$i]['id_note'] ?>)">
                <input type="checkbox" style="display:none" class="delete-sign" name="<?= $i ?>" value="<?= $data['notes'][$i]['id_note'] ?>">
                <h2><?= $data['notes'][$i]['title'] ?></h2>
                <p class="snippet"><?= $data['notes'][$i]['content'] ?></p>
                <p><?= $data['notes'][$i]['tanggal_pembuatan'] ?></p>
            </div>
        <?php endfor ?>
    </div>
<?php } else { ?>
    <h2>Kamu Tidak Memiliki Catatan</h2>
<?php } ?>