<!DOCTYPE HTML>
<html>
    <head>
        //pembuatan title atau judul
        <title>Login</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="container">
          //pembuatan header
          <h1>Login</h1>
            //menampung data yang akan di inputkan ke index.php
            <form method="POST" action="../index.php">

                <input name="tujuan" type="hidden" value="LOGIN" >
                
                //pembuatan form login
                //input username untuk login
                <label>Username</label>
                <br>
                //user dapat menginputkan username disini
                <input name="username" type="text">
                <br>
                //input password untuk login
                <label>Password</label>
                <br>
                //user dapat menginputkan password disini
                <input name="password" type="password">
                <br>

                //button untuk masuk aplikasi
                <button>Log In</button>
                
                //feedback untuk mendaftarkan akun baru
                <p> Belum punya akun?
                  <a href="daftar.php">Daftar di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
