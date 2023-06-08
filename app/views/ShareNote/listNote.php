
    <div>
        <div class="selected-friends">
            <h2>Teman Dipilih</h2>
            <ul>
                <?php foreach($data['friends'] as $friend) : ?>
                    <li><h3><?= $friend['first_name'] .' '. $friend['last_name'] ?></h3><input class="friend-sign" type="hidden" value="<?= $friend['id']; ?>"></li>
                <?php endforeach ?>
            </ul>
        </div>

        <h1>Pilih Catatan</h1>
        <section class="notes">
            <div class="left"> 
                <?php for($i = 0 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <button class="select">Pilih Note</button>
                        <input class="note-sign" type="checkbox" style="display:none" name="<?= $data['notes'][$i]['id_note'] ?>" value="<?= $data['notes'][$i]['id_note'] ?>">
                    </div>
                <?php endfor ?>
            </div>
            <div class="mid">
                <?php for($i = 1 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <button class="select">Pilih Note</button>
                        <input class="note-sign" type="checkbox" style="display:none" name="<?= $data['notes'][$i]['id_note'] ?>" value="<?= $data['notes'][$i]['id_note'] ?>">
                    </div>
                <?php endfor ?>
            </div>
            <div class="right">
            <?php for($i = 2 ; $i < sizeof($data['notes']) ; $i += 3) :?>
                    <div class="note">
                        <h2><?= $data['notes'][$i]['title']?></h2>
                        <p class="snippet"><?= $data['notes'][$i]['content']?></p>
                        <button class="select">Pilih Note</button>
                        <input class="note-sign" type="checkbox" style="display:none" name="<?= $data['notes'][$i]['id_note'] ?>" value="<?= $data['notes'][$i]['id_note'] ?>">
                    </div>
                <?php endfor ?> 
            </div>
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
        <!-- <h1>Teman Yang dipilih</h1>
        <section class="friends">
                <div class="card">
                    <img src="<?= BASEURL.$friend['img']?>" alt="">
                    <div class="detail">
                        <h2><?= $friend['first_name'] .' '. $friend['last_name'] ?></h2>
                        <p class="username"><?= $friend['username'] ?></p>
                        <button type="button" class="pilih">Pilih</button>
                        <input class="sign" type="checkbox" style="display:none" name="<?= $friend['id'] ?>" value="<?= $friend['id'] ?>">
                    </div>
                </div>
        </section> -->
        <button type="button" id="kirim" class="send-request">Kirim</button>
    </div>