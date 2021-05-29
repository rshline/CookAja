<?php
  session_start();
                /**
                * membuat class dimana class tersebut akan menyalurkan data input user ke database
                *
                *@kelompok8
                */
/*apabila username yang dicek sudah terdaftar, data akan di redirect ke index.php*/
if(isset($_SESSION['username'])){
    header("location:index.php");
  }
  
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    /*menuliskan title*/
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    /*menentukan tampilan dari file css*/
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>
  
  <body>
    /**
    * membuat container untuk menyimpan data akun baru user
    *
    *@var string
    */
    <div class="container">
      
      /*permisalan form baru*/
      <form class="form-signin" name="form1" method="post" action="createuser.php">
        /*pendeskripsian page kepada user*/
        <h2 class="form-signin-heading">Buat Akun Baru</h2>
        /*user dapat menginputkan data data yang dibutuhkan disini*/
        <input name="myusername" id="myusername" type="name" class="form-control" placeholder="Nama : " autofocus>
        <input name="myemail" id="myemail" type="email" class="form-control" placeholder="Email : " autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Masukkan Password : ">
         <input name="retypepwd" id="retypepwd" type="password" class="form-control" placeholder="Ketik Ulang Password : ">
        /*user dapat memencet tombol submit apabila data sudah benar*/
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>

        <div id="message"></div>
      </form>
  </div> <!-- /container -->

    /*permisalan untuk javascript*/
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/create.js"></script>
    <script>document.getElementById("submit").disabled = true;</script>
    
  </body>
</html>
