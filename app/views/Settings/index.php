<main>
    <section>
        <form action="<?= BASEURL ?>/settings/uploadImg" method="post" enctype="multipart/form-data">
            <h1>Pengaturan</h1>
            <li class="img">
                <img class="display-img" src="<?= BASEURL . $data['user']['img'] ?>" alt="">
                <div>
                    <label for="img">Upload Gambar</label>
                    <input id="img" type="file" style="display:none" name="img">
                    <button class="save-img">Simpan Gambar</button>
                </div>
            </li>
        </form>
        <form action="<?= BASEURL ?>/settings/ubahProfile" method="post">
            <ul>
                <li class="name">
                    <div class="first-name">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" value="<?= $data['user']['first_name'] ?>">
                    </div>
                    <div>
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" value="<?= $data['user']['last_name'] ?>">
                    </div>
                </li>
                <li>
                    <?php if (isset($_SESSION['invalid']['email'])) { ?>
                        <p style="text-align: center; font-size:13px;">Email Yang Anda Masukkan Sudah Digunakan</p>
                    <?php } ?>
                    <label for="">Email</label>
                    <input type="email" value="<?= $data['user']['email'] ?>" name="email">
                </li>
                <li>
                    <?php if (isset($_SESSION['invalid']['username'])) { ?>
                        <p style="text-align: center; font-size:13px">Username Yang Anda Masukkan Sudah Digunakan</p>
                    <?php } ?>
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?= $data['user']['username'] ?>" name="username">
                </li>
                <li>
                    <button name="id" value<?= $data['user']['id'] ?>>Ganti</button>
                </li>
            </ul>
        </form>
    </section>
</main>
<script src="<?= BASEURL; ?>/assets/js/setting.js"></script>
<?php unset($_SESSION['invalid']) ?>