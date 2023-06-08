<header>
    <div class="logo"></div>
</header>
<main>
    <section class="one">
        <div class="text">
            <h1>Catat Dimanapun KapanPun</h1>
<<<<<<< HEAD
            <p>Jadikan aktivitasmu lebih teratur dengan todo list dan catat apapun yang kamu perlukan segera tanpa kendala serta bagikan bersama teman</p>
=======
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique maxime eos animi numquam aspernatur? Itaque quos hic dignissimos rem, voluptates iusto nemo soluta. Numquam itaque velit eius ullam eos libero!</p>
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
            <div class="buttonGroup">
                <a href="<?= BASEURL ?>/home/login/"><button>Login</button></a>
                <a href="<?= BASEURL ?>/home/register/"><button>Register</button></a>
            </div>
        </div>
    </section>
    <div class="two">
        <div>
<<<<<<< HEAD
            <i class="fa-solid fa-user-group fa-8x"></i>
            <h2 style="font-family: 'Poppins'; font-weight:bold; font-size:1.5em;">Fitur Pertemanan</h2>
            <p style="font-family: 'Poppins'; font-size:1em; text-align:center;">Tambah teman untuk mempermudahkanmu berbagi catatan</p>
        </div>
        <div>
            <i class="fa-solid fa-hand-holding-hand fa-8x"></i>
            <h2>Kirim Dan Terima Catatan</h2>
            <p>Berbagai catatan dengan mudah kepada teman</p>
        </div>
        <div>
            <i class="fa-solid fa-globe fa-8x"></i>
            <h2>Akses Dimanapun</h2>
            <p>Dapatkan kemudahan untuk mengakses catatan yang kamu miliki di perangkat apapun</p>
=======

        </div>
        <div>

        </div>
        <div>
            
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
<<<<<<< HEAD
                <div>
                    <i class="fa-solid fa-user-group fa-8x"></i>
                    <h2 style="font-family: 'Poppins'; font-weight:bold; font-size:1.5em;">Fitur Pertemanan</h2>
                    <p style="font-family: 'Poppins'; font-size:1em; text-align:center;">Tambah teman untuk mempermudahkanmu berbagi catatan</p>
                </div>
            </div>
            <div class="carousel-item">
                <div>
                    <i class="fa-solid fa-hand-holding-hand fa-8x"></i>
                    <h2>Kirim Dan Terima Catatan</h2>
                    <p>Berbagai catatan dengan mudah kepada teman</p>
                </div>
            </div>
            <div class="carousel-item">
                <div>
                    <i class="fa-solid fa-globe fa-8x"></i>
                    <h2>Akses Dimanapun</h2>
                    <p>Dapatkan kemudahan untuk mengakses catatan yang kamu miliki di perangkat apapun</p>
                </div>
=======
                <h1>Akses Dimanapun</h1>
            </div>
            <div class="carousel-item">
                <h1>Akses Dengan berbagai Perangkat</h1>
            </div>
            <div class="carousel-item">
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="three">
        <div class="left">
            <img src="<?= BASEURL;?>/assets/img/webimage/3968691.jpg" alt="">
        </div>
        <div class="right">
            <div>
<<<<<<< HEAD
                <h1>Catat Apapun</h1>
                <p>Luangkan waktu dan mulailah mencatat yang kamu perlukan dengan projekin. Dapatkan berbagai kemudahan dalam mencatat dimanapun dengan perangkat apapun secara gratis</p>
=======
                <h1>Lorem ipsum </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit animi, aperiam totam eius aliquid atque necessitatibus. Asperiores ex, accusamus magni distinctio aliquam aliquid totam fugit enim, corrupti libero atque nulla!</p>
>>>>>>> 8cc2ec5a25b3dd018acfdede28f1fd70b909961d
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,96L48,90.7C96,85,192,75,288,106.7C384,139,480,213,576,245.3C672,277,768,267,864,234.7C960,203,1056,149,1152,117.3C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <section class="four">
        <div>
        <h1>Register Now</h1>

            <div class="form">
                <form action="<?= BASEURL; ?>/home/registerInHome" method="post">
                    <ul>
                        <li class="nama">
                            <input type="text" placeholder="First Name" name="first_name" value="<?php if(isset($_SESSION['temp'])) echo $_SESSION['temp']['cookies']['first_name'];?>" >
                            <input type="text" placeholder="Last Name" name="last_name"  value="<?php if(isset($_SESSION['temp'])) echo $_SESSION['temp']['cookies']['last_name'];?>" >
                        </li>
                        <li>
                            <?php if(isset($_SESSION['temp']['email'])) : ?>
                                <p>Email Sudah Terdaftar</p>
                            <?php endif ?>
                            <input type="email" placeholder="Email" name="email"  value ="<?php if(isset($_SESSION['temp'])) echo $_SESSION['temp']['cookies']['email'] ;?>">
                        </li>
                        <li>
                            <?php if(isset($_SESSION['temp']['username'])) : ?>
                                <p>Username Sudah Terdaftar</p>
                            <?php endif ?>
                            <input type="text" placeholder="username" name="username"  value="<?php if(isset($_SESSION['temp'])) echo $_SESSION['temp']['cookies']['username'];?>">
                        </li>
                        <li>
                            <?php if(isset($_SESSION['temp']['password'])) : ?>
                                <p>Password Tidak Sesuai</p>
                            <?php endif ?>
                            <input type="password" placeholder="Password" name="password">
                        </li>
                        <li>
                            <input type="password" placeholder="Ulangi Password" name="password2">
                        </li>
                        <li class="sex">
                            <div class="pria">
                                <label for="pria">Pria</label>
                                <input type="radio" name="gender" value="pria" id="pria">
                            </div>
                            <div class="wanita">
                                <label for="wanita">Wanita</label>
                                <input type="radio" name="gender" value="wanita" id="wanita">
                            </div>
                        </li>
                        <li>
                            <button type="submit" name="daftar">Daftar</button>
                        </li>
                    </ul>
                    
                </form>
            </div>
        </div>
    </section>
</main>
<svg class="svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,197.3C384,203,480,181,576,165.3C672,149,768,139,864,149.3C960,160,1056,192,1152,192C1248,192,1344,160,1392,144L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
<footer>

</footer>
<?php

unset($_SESSION['temp']);