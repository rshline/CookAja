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
    <title>Purchase History</title>
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

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Purchase History</li>
				</ol>
			</div>
			<div class="review-payment">
				<h2>History Pembelian & Pembayaran</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Produk</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah Paket</td>
							<td class="total">Rincian Harga</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						require_once "config.php";
						$userId=$_SESSION['UserId'];
						$sql="SELECT * FROM orders WHERE User_Id='$userId' AND Status='Checked'";
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
										<h4><a href="">'.$row["P_Name"].'</a></h4>
										<p>Product ID: '.$row["Product_Id"].'</p>
									</td>
									<td class="cart_price">
										<p>Rp. '.$row["Amount"]/$row["Quantity"].',00</p>
									</td>
									<td class="cart_price">
										<p>'.$row["Quantity"].' buah</p>
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
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Jumlah Pembayaran</h3>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Total Pembayaran dari Transaksi <span>Rp <?php echo $cartTotal;?>,00</span></li>
						</ul>
							
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include('footer.php');?> <!--Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>