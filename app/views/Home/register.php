<main>
    <?php var_dump($_SESSION['temp']) ?>
    <form action="<?= BASEURL?>/home/registerInRegister" method="post">
        <h1>Register</h1>
        <ul>
        <div>
            <input type="text" placeholder="First Name" name="first_name" required>
            <input type="text" placeholder="Last Name" name="last_name"required>
        </div>
        <li><?php if(isset($_SESSION['temp']['email'])) :?><p>Email Sudah Terdaftar</p><?php endif; ?><input type="email" placeholder="YourMail@gmail.com" name="email" <?php if(isset($_SESSION['temp'])) : ?> value="<?= $_SESSION['temp']['cookies']['email'] ?>" <?php endif ?> required ></li>
        <li><?php if(isset($_SESSION['temp']['username'])) :?><p>Username Sudah Terdaftar</p><?php endif; ?><input type="text" name="username" placeholder="Username" <?php if(isset($_SESSION['temp'])) : ?> value="<?= $_SESSION['temp']['cookies']['username'] ?>" <?php endif ?> required></li>
        <li><?php if(isset($_SESSION['temp']['password'])) :?><p>Password Tidak Sesuai</p><?php endif; ?><input type="password" name="password" placeholder="Password" required></li>
        <li><input type="password" name="password2" placeholder="Masukkan Kembali Password" required></li>
        <li class="sex">
            <div class="sex">
                <label for="pria">Pria</label>
                <input type="radio" name="gender" value="pria" id="pria" required>
            </div>
            <div class="sex">
                <label for="wanita">Wanita</label>
                <input type="radio" name="gender" value="wanita" id="wanita" required>       
            </div>
        </li>
        <li><button type="submit">Buat Akun</button></li>
        <p><a href="<?= BASEURL ?>/home/"><i class="fa-solid fa-arrow-left"></i>Kembali Ke Home</a></p>
        </ul>
    </form>
</main>
<?php unset($_SESSION['temp']) ?>