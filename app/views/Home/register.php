<main>
    <form action="<?= BASEURL?>/home/setAkun" method="post">
        <h1>Register</h1>
        <ul>
        <div>
            <input type="text" placeholder="First Name" name="first_name">
            <input type="text" placeholder="Last Name" name="last_name">
        </div>
        <li><input type="email" placeholder="YourMail@gmail.com" name="email"></li>
        <li><input type="text" name="username" placeholder="Username"></li>
        <li><input type="password" name="password1"></li>
        <li><input type="password" name="password2"></li>
        <li>
            <div class="sex">
                <label for="pria">Pria</label>
                <input type="radio" name="gender" value="pria" id="pria">
            </div>
            <div class="sex">
                <label for="wanita">Wanita</label>
                <input type="radio" name="gender" value="wanita" id="wanita">       
            </div>
        </li>
        <li><button type="submit">Buat Akun</button></li>
        </ul>
    </form>
</main>