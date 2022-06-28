<main>
    <form action="<?= BASEURL ?>/summary/save" method="post">
        <input type="text" value="<?= $data['title'] ?>" name="judul">
        <textarea id="" cols="30" rows="10" name="isi"><?= $data['content']?></textarea>
        <div class="button-group">
            <button class="save" name="simpan" value="<?=$data['id_note']?>">Simpan</button>
            <a href="<?= BASEURL?>/summary" class="exit">Keluar</a>
        </div>
    </form>
</main>