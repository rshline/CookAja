/* TUGAS FILE : INDEX MENGONTROL, MENGKONEKSI DATABASE SERTA MEMASUKKAN DATA KE DALAM SQL DAN FILE UTAMA LOGIN REGISTER 
   NAMA FILE : index.php */

<?php 
    /* nama server kita */
    $servername = "localhost";

    /* nama database kita */
    $database = "cookaja"; 

    /* nama user yang terdaftar pada database (default: root) */
    $username = "root";

    /* password yang terdaftar pada database (default : "") */ 
    $password = ""; 

    /* membuat koneksi sql */
    $conn = mysqli_connect($servername, $username, $password, $database);

    /* mengecek koneksi database apakah berhasil terkonek/tidak */
    if (!$conn) {
        die("Maaf koneksi anda gagal : " . mysqli_connect_error());
    }else{
        echo "<h1>Login Berhasil..</h1>";
    }

    /* membuat tujuan data sql akan dimasukan ke database */
    if(isset($_POST["tujuan"])){

        $tujuan = $_POST["tujuan"];
        
        if($tujuan == "LOGIN"){
            $username = $_POST["username"];
            $password = $_POST["password"];

            /* format untuk mengecek data inputan user ke database yang sudah ada saat user login  */
            $query_sql = "SELECT * FROM user
                                   WHERE username = '$username' AND password = '$password'";
            
            $result = mysqli_query($conn, $query_sql);

            /* kondisi notifikasi jika user berhasil login atau gagal */
            if(mysqli_num_rows($result) > 0){
                echo "<h1>Selamat Datang, ".$username."!</h1>";
            }else{
                echo "<h2>Username atau Password Salah!</h2>";
            }
    
        /* format untuk memasukkan data baru ke dalam database user saat user melakukan register akun  */
        }else{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            
            $query_sql = "INSERT INTO user (nama, password, email) 
                                               VALUES ('$username', '$password', '$email')";

            /* kondisi notifikasi jika user berhasil terdaftar atau gagal */
            if (mysqli_query($conn, $query_sql)) {
                echo "
                        <h1>Username $username berhasil terdaftar</h1>
                        <a href='views/loginform.php'>Kembali Login</h1>
                    ";
            } else {
                echo "Pendaftaran Gagal : " . mysqli_error($conn);
            }
        }
    }
    
    
    // tutup koneksi
    mysqli_close($conn);
?>
