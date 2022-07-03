<main>
    <div class="property">
        <div class="search-box">
            <input type="text" placeholder="Cari Catatan">
        </div>
        
        <div>
                <button type="button" class="delete-note">Hapus</button>
                <form action="<?= BASEURL; ?>/summary/deleteNote" method="post" class="option">
                <button class="delete-action" style="display:none">Hapus</button>
                <button type = "button" class="cancel-delete" style="display:none" onclick="cancelDelete()">Batal</button>
        </div>
    </div>

    <div class="content">
        <section class="notes">
            <?php if($data['notes'] != null) {?>
            <div class="left"> 
                <?php for($i = 0 ; $i < sizeof($data['notes']) ; $i += 2) :?>
                    <div class="note" id="<?= $data['notes'][$i]['id_note'] ?>" onclick="editNote(<?= $data['notes'][$i]['id_note']?>)">
                        <input type="checkbox" style="display:none" class="delete-sign" name="<?= $i?>" value = "<?= $data['notes'][$i]['id_note']?>">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <p><?= $data['notes'][$i]['tanggal_pembuatan']?></p>
                    </div>
                <?php endfor ?>
            </div>
            <div class="right">
                <?php for($i = 1 ; $i < sizeof($data['notes']) ; $i += 2) :?>
                    <div class="note" id="<?= $data['notes'][$i]['id_note'] ?>" onclick="editNote(<?= $data['notes'][$i]['id_note']?>)">
                    <input type="checkbox" style="display:none" class="delete-sign" name="<?= $i?>" value = "<?= $data['notes'][$i]['id_note']?>">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <p><?= $data['notes'][$i]['tanggal_pembuatan']?></p>
                    </div>
                <?php endfor ?>
            </div>
            <?php }else{ ?>
                <h2>Kamu Tidak Memiliki Catatan</h2>
            <?php } ?>
        </section>
        </form>
        <section class="lists">
            <h2>TO DO LIST</h2>
            <?php foreach($data['lists'] as $list) : ?>
                <ul class="list">

                    <div class="delete-list">
                        <i class="fa-solid fa-circle-xmark" onclick="deleteList(event)" name="<?= $list['id_list'] ?>"></i>
                    </div>

                    <h3><?= $list['judul_list'] ?></h3>
                    <?php foreach($data['items'] as $item) :?>
                        <?php if($item['id_list'] == $list['id_list']) :?> 
                            <li class="item">
                            <p onblur="editItem(event)" contenteditable="true" name="<?= $item['id_item'] ?>"><?php if($item['info'] == 'y') { ?> <del><?= $item['content'] ?></del><?php } else echo $item['content']?></p>
                                <div class="item-property" onclick="checkList(event)">
                                    <i class="fa-solid fa-trash" name="<?= $item['id_item'] ?>"></i>
                                    <input value="<?= $item['info'] ?>" type="checkbox" onclick="checkList(event)" <?php if($item['info'] == 'y') echo 'checked' ?> name="<?= $item['id_item']?>">
                                </div>
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                    <li class="new-item">
                        <input type="text" id="judul-item">
                        <button type="button" class="new-item-button" value="<?= $list['id_list']?>">Tambah</button>
                    </li>
                </ul>
            <?php endforeach ?>
            <ul class="list new-list-button">
                Tambah List
            </ul>

            <ul class="list new-list" style="display:none;">
                <input type="text" id="new-list-input">
                <div class="button-group">
                    <button class="new-list-action">Tambah</button>
                    <button class="cancel-new-list">Batal</button>
                </div>
            </ul>

        </section>
    </div>
    <div class="new-note-button" onclick="showDialog()">
        <i class="fa-solid fa-circle-plus fa-2x"></i>
    </div>
</main>
<dialog class="new-note">
    <div>
    <form action="<?= BASEURL;?>/summary/newNote/" method="post">
        <input type="text" name="judul" placeholder="Judul....">
        <textarea name="isi" id="" cols="30" rows="10" placeholder="Masukkan Isi....."></textarea>
        <div class="button-group-note">
            <button>Simpan</button>
            <button class="cancel-save-note">Batal</button>
        </div>
    </form>
    </div>
</dialog>
<script src="<?= BASEURL;?>/assets/js/summary.js"></script>
