<div class="container">
    <h1>Pilih Teman</h1>
    <section class="friends">
        <?php foreach($data['friends'] as $friend) : ?>
            <div class="card">
                <img src="<?= BASEURL.$friend['img']?>" alt="">
                <div class="detail">
                    <h2><?= $friend['first_name'] .' '. $friend['last_name'] ?></h2>
                    <p class="username"><?= $friend['username'] ?></p>
                    <button type="button" class="pilih">Pilih</button>
                    <input class="sign" type="checkbox" style="display:none" name="<?= $friend['id'] ?>" value="<?= $friend['id'] ?>">
                </div>
            </div>
        <?php endforeach ?>
    </section>
    <button type="button" class="next">Selanjutnya</button>
</div>
<div>
    <h1>Catatan Dikirim</h1>
    <div class="notes">
        <?php foreach($data['notes'] as $note) : ?>
        <div class="note" style="display : flex; flex-direction : column ; justify-content : space-between;">
            <h3 class="title" style="margin-bottom : 10px;"><?= $note['title'] ?><h3>
            <p class="snippet"><?= $note['content'] ?></p>
            <h3 class="to">Dikirim Kepada : <?= $note['first_name'] ?></h3>
        </div>
        <?php endforeach ?>
    </div>
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