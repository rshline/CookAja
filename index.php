<?php 
    /* nama server kita */
    $servername = "localhost";

    /* nama database kita */
    $database = "cookaja"; 

    /* nama user yang terdaftar pada database (default: root) */
    $username = "root";

    /* password yang terdaftar pada database (default : "") */ 
    $password = ""; 

    // membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $database);

    // mengecek koneksi
    if (!$conn) {
        die("Maaf koneksi anda gagal : " . mysqli_connect_error());
    }else{
        echo "<h1>Login Berhasil..</h1>";
    }


    if(isset($_POST["tujuan"])){

        $tujuan = $_POST["tujuan"];
        
        if($tujuan == "LOGIN"){
            $nama = $_POST["nama"];
            $password = $_POST["password"];
            
            $query_sql = "SELECT * FROM user
                                   WHERE nama = '$nama' AND password = '$password'";
            
            $result = mysqli_query($conn, $query_sql);

            if(mysqli_num_rows($result) > 0){
                echo "<h1>Selamat Datang, ".$nama."!</h1>";
            }else{
                echo "<h2>Username atau Password Salah!</h2>";
            }
    
        }else{
            $nama = $_POST["nama"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            
            $query_sql = "INSERT INTO user (nama, password, email) 
                                               VALUES ('$nama', '$password', '$email')";

            if (mysqli_query($conn, $query_sql)) {
                echo "
                        <h1>Username $nama berhasil terdaftar</h1>
                        <a href='adduser.php'>Kembali Login</h1>
                    ";
            } else {
                echo "Pendaftaran Gagal : " . mysqli_error($conn);
            }
        }
    }
    
    
    // tutup koneksi
    mysqli_close($conn);
?>
