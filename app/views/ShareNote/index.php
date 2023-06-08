<link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/summary/friends.css">
<main>
    <nav>
        <ul>
            <li id='note-anda'>Note Anda</li>
            <li id='kirim-note'>Kirim Note</li>
        </ul>
    </nav>
    <div class="content">
    <section class="notes">
        <?php if($data['notes'] != null) {?>
            <div class="left"> 
                <?php for($i = 0 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <p>From : <?=($data['notes'][$i]['username']) ?></p>
                        <button type="button" class="save-note" value="<?= $data['notes'][$i]['id_note']?>">Simpan Catatan</button>
                        <input class="note-sign" type="hidden" style="display:none" value="<?= $data['notes'][$i]['id'] ?>">
                    </div>
                <?php endfor ?>
            </div>

            <div class="mid">
                <?php for($i = 1 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <p>From : <?=($data['notes'][$i]['username']) ?></p>
                        <button type="button" class="save-note" value="<?= $data['notes'][$i]['id_note']?>">Simpan Catatan</button>
                        <input class="note-sign" type="hidden" style="display:none" value="<?= $data['notes'][$i]['id'] ?>">
                    </div>
                <?php endfor ?>
            </div>

            <div class="right">
            <?php for($i = 2 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <p>From : <?=($data['notes'][$i]['username']) ?></p>
                        <button type="button" class="save-note" value="<?= $data['notes'][$i]['id_note']?>">Simpan Catatan</button>
                        <input class="note-sign" type="hidden" style="display:none" value="<?= $data['notes'][$i]['id'] ?>">
                    </div>
                <?php endfor ?> 
            </div>
        <?php } else{?>
                <h2>Tidak Ada Yang Mengirim Catatan</h2>
        <?php } ?>
            <script>
                    document.querySelectorAll('.snippet').forEach(function(e){
                        let temp = e.textContent;
                        if(temp.length > 300 && window.innerWidth > 810){
                            temp = temp.substring(0, 300) + '......';
                            e.textContent = temp;
                        }
                        else{
                            temp = temp.substring(0, 150) + '......';
                            e.textContent = temp;   
                        }
                    });
            </script>
        </section>
    </div>
</main>
<script src="<?= BASEURL; ?>/assets/js/share-note.js"></script>
