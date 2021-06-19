<?php
	session_start();
	if($_SESSION["Type"] == "user" OR $_SESSION["Type"] == "vip"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Konfirmasi Pembayaran</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php include('header.php');?> <!--Footer-->

    <?php
        if(isset($_POST["kembali"])){
            require_once "config.php";
            $userId=$_SESSION['UserId'];
            $sql="UPDATE orders SET Status='Checked' WHERE User_Id='$userId'";
            mysqli_query($dbhandle,$sql);
            header('location:index.php');
        }
    ?>
    <br>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <center> <h3>KONFIRMASI PEMBAYARAN BUNDLE CookAja</h3></center>
                <center> <p>Kirimkan Bukti Transfer dan Screnshoot Layar ini kemudian kirim ke Whatsapp CookAja!</p></center>
                <?php
                    require_once "config.php";
                    $kode = "CAB" . rand(10000,99999);
                ?>
                <h3 align="margin-left">KONFIRMASI PEMBAYARAN</h3>
                <h5 align="margin-left">Status Pembayaran               : Waiting Confirmation</h5>
                <h5 align="margin-left">Konfirmasi Pembayaran           : Via Whatsapp</h5>
                <h5 align="margin-left">Metode Pembayaran               : Transfer to 2436173726 BCA an PT. CookAja Indonesia</h5>
                <h5 align="margin-left">Batas Pembayaran                : 24 jam</h5>
            </div>
        </div>
    </section>
    </br>

    <section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Produk</td>
                            <td class="description"></td>
                            <td class="price">Harga</td>
                            <td class="quantity">Jumlah</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "config.php";
                        $userId=$_SESSION['UserId'];
                        $sql="SELECT * FROM orders WHERE User_Id='$userId' AND Status='notChecked'";
                        $result = mysqli_query($dbhandle,$sql);
                    
                        $cartTotal=0;

                        while($row=mysqli_fetch_array($result)){
                    
                            $cartTotal=$cartTotal+$row["Amount"];
                            $url2="deleteProductToCart.php?id=".$row["O_Id"];
                            echo '<tr>
                                    <td class="cart_product">
                                        <a href=""><img src="'.$row["Image"].'" width="100" height="100" alt="not found"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h6><a href="">'.$row["P_Name"].'</a></h6>
                                        <p>ID Produk: '.$row["Product_Id"].'</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>Rp. '.$row["Amount"]/$row["Quantity"].',00</p>
                                    </td>
                                    <td class="cart_price">
                                        <input type="number" value="'.$row['Quantity'].'" name="jumlah" min="1" max="100" style="margin-left:-1vw"
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">Rp. '.$row["Amount"].',00</p>
                                    </td>
                                    
                                </tr>';
                        };
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    <center> <p> Estimasi Pengiriman 2-3 Hari Kerja (Tidak termasuk hari minggu dan tanggal merah)</p></center>

    <div class="row">
    <form action="pembayaran.php" method="POST">      
    <center><input type="submit" name="kembali" value="Kembali ke Menu Utama" class="btn btn-default update" href=""></center>
    </form>
    </div>

    </section> <!--/#cart_items-->
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    </body>
    </html>
