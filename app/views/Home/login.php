    <section class="login">
        <h1>Login</h1>
        <form action="<?= BASEURL; ?>/home/loginValidate" method="post">
            <ul>
                <li>
                <?php if(isset($_SESSION['invalid-login'])) : ?>
                    <p>username/Password Yang Anda Masukkan Salah</p>
                <?php endif ?>
                </li>
                <li>
                    <input type="text" name="username" placeholder="Username" required>
                </li>
                <li>
                    <input type="password" name="password" placeholder="Password" required>
                </li>
                <li>
                    <button type="submit" name="masuk">Login</button>
                </li>
            </ul>
        </form>
        <p>
            Belum memiliki akun? Daftar akun <a href="<?= BASEURL ?>/home/register/">disini</a>.
        </p>
    </section>
<?php unset($_SESSION['invalid-login']); ?>
