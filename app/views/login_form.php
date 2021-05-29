<!DOCTYPE HTML>
<html>
    /**
    * Class untuk membuat form login user
    *
    * @kelompok8
    */
    <head>
        /**
        * membuat judul/title login
        */
        <title>Login</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        /**
        * membuat container untuk menyimpan data input user
        *
        * menerima input text berbentuk string
        */
        <div class="container">
          <h1>Login</h1>
            /*Menggunakan metode post untuk menyimpan data yang akan di input user*/
            <form method="POST" action="index.php">

                <input name="tujuan" type="hidden" value="LOGIN" >

                /**
                * membuat form dimana user dapat menginputkan nama dan password
                *
                *@var string
                */
                <label>Username</label>
                <br>
                /*user dapat input nama/username disini*/
                <input name="nama" type="text">
                <br>
                <label>Password</label>
                <br>
                /*user dapat input password disini*/
                <input name="password" type="password">
                <br>

                /*pembuatan button untuk login*/
                <button>Log In</button>
                
                /**
                * membuat feedback dimana user dapat mendaftarkan akun baru
                *
                * user akan di redirect ke class adduser.php
                */
                <p> Belum punya akun?
                  <a href="adduser.php">Daftar di sini</a>
                </p>
            </form>
        </div>
    </body>
</html>
