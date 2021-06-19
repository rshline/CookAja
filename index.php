 	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | CookAja.com</title>
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
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><!--/head-->

<body>
	
	<?php include('header.php');?> <!--header-->
	<?php
		require_once "config.php";
						
		$sql11 ="SELECT * FROM recipe order by P_Id desc LIMIT 2";
		
		$result11 = mysqli_query($dbhandle,$sql11);
		
		
		
	?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>C</span>ookAja</h1>
									<h2>Soft Opening CookAja</h2>
									<p><b>Segera Berlangganan khusus untuk user VIP</b></p>
									<p><b>Dapatkan Banyak Diskon hanya di <i>CookAja</i></b></p>
									<?php
										if(@$_SESSION["Type"] == "user"){
											echo '<a class="btn btn-default get" href="login.php">Langganan Sekarang</a>';
										}

										if(@$_SESSION["Type"] == "vip"){
											echo '<a class="btn btn-default get" href="login.php">Check Promo lainnya Sekarang</a>';
										}
									?>
									
								</div>
								<div class="col-sm-6">
									<img src="images/home/bundle2.png" class="girl img-responsive" alt="" />									
								</div>
							</div>
							<?php
								while($row11=mysqli_fetch_array($result11)){
									$url1="recipe-details.php?id=".$row11["P_Id"];
									echo '<div class="item ">
										<div class="col-sm-6">
											<h1><span>C</span>ookaja New Recipe</h1>
											<h2>'.$row11["RecipeName"].'</h2>
											<p</p>';
											if(@$_SESSION["Type"] != "admin"){
												echo '<a class="btn btn-default get" href="'.$url1.'">Lihat Recipe Sekarang</a>';
											}
										echo '	
										</div>
										<div class="col-sm-6">
											<img src="'.$row11["Image"].'" class="" width="400" height="350" alt="" />
											
										</div>
									</div>';
								}
								
							?>
							<?php
								while($row11=mysqli_fetch_array($result11)){
									$url1="recipe-details.php?id=".$row11["P_Id"];
									echo '<div class="item ">
										<div class="col-sm-6">
											<h1><span>C</span>ookaja New Recipe</h1>
											<h2>'.$row11["RecipeName"].'</h2>
											<p</p>';
											if(@$_SESSION["Type"] != "admin"){
												echo '<a class="btn btn-default get" href="'.$url1.'">Lihat Recipe Sekarang</a>';
											}
										echo '	
										</div>
										<div class="col-sm-6">
											<img src="'.$row11["Image"].'" class="" width="400" height="350" alt="" />
											
										</div>
									</div>';
								}
								
							?>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<br>
	<br>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>SALE</h2>
						<h2><a href="index.php">PROMO PAKET HEMAT VIP</a></h2>

						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
								require_once "config.php";
								$sql ="SELECT * FROM categories ORDER BY Name";
								$result = mysqli_query($dbhandle,$sql);
								while($row=mysqli_fetch_array($result))
								{
									$url1="index.php?id=".$row["Name"];
									echo '<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a href="'.$url1.'">'.$row["Name"].'</a></h4>
											</div>
										</div>';
								}
							?>
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Resep Terbaru</h2>
						<div class="col-md-12">
							<div class="search_box pull-right">
								<form action="#" method="POST">
									<input type="text" name="search_box" placeholder="Cari dengan Judul..."/>
									<input  type="hidden" class="btn btn-primary" name="search">
								</form>
								<br>
								<br>
							</div>
							</br></br>
						</div>
						<?php
							require_once "config.php";

							if(isset($_GET["B_Id"])){
								$categoryName = $_GET["B_Id"];
								$sql ="SELECT * FROM products WHERE Category='$categoryName' order by B_Id desc";
								$result = mysqli_query($dbhandle,$sql);
							}
							else{
								$sql ="SELECT * FROM products";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " WHERE P_Name LIKE '%{$search_term}%'";
								}else{
									$sql .= " order by B_Id desc";
								}
								
								$result = mysqli_query($dbhandle,$sql);
							}
							
							if(mysqli_num_rows($result) == 0){
								echo '<div class="col-sm-6">
										<h2>Bundle Tidak Tersedia</h2>
									</div>';
							}else{
								while($row=mysqli_fetch_array($result))
								{
									$url2="product-details.php?id=".$row["B_Id"];
									$url1="editProduct.php?id=".$row["B_Id"];
									$discount = 30;
									$potongan = ($row['Price']*30/100);
									$hargaAkhir = $row['Price'] - $potongan;
								 
									echo '<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
														<div class="productinfo text-center">
															<img src="'.$row["Image"].'" alt="" width="125" height="175" />
															<p><h2>'.$row["P_Name"].'</h2></p>';
															
															if(@$_SESSION["Type"] == "admin"){
																echo '<a href="'.$url1.'" class="btn btn-default add-to-cart"><i class=""></i>Edit Paket</a>';

															}if(@$_SESSION["Type"] == "vip"){
																echo'<h2><del>Rp '.$row["Price"].',00</del><br>Rp. '.$hargaAkhir.',00</h2>
																<p>Diskon <b>'.$discount.'</b> %</p>';
																echo '<a href="'.$url2.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>BELI PAKET</a>';
															}else{
																echo '<a href="'.$url2.'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lihat PROMO PAKET</a>';
															}
															echo '
														</div>
														<img src="images/home/new.png" class="new" alt="" />
												</div>
											</div>
										</div>';
								}
							}
							

							if(isset($_GET["id"])){
								$categoryName = $_GET["id"];
								$sql ="SELECT * FROM recipe WHERE Category='$categoryName' order by P_Id desc";
								$result = mysqli_query($dbhandle,$sql);
							}
							else{
								$sql ="SELECT * FROM recipe";
								
								if (isset($_POST['search'])){
									$search_term = $_POST['search_box'];
									$sql .= " WHERE RecipeName LIKE '%{$search_term}%'";
								}else{
									$sql .= " order by P_Id desc";
								}
								
								$result = mysqli_query($dbhandle,$sql);
							}
							if(mysqli_num_rows($result) == 0){
								echo '<div class="col-sm-6">
										<h2 align="center">..............................</h2>
										<h2 align="center">Resep Tidak ditemukan </h2>
										<h2 align="center">..............................</h2>
									</div>';
							}else{
								while($row=mysqli_fetch_array($result))
								{
									$url3="recipe-vip.php?id=".$row["P_Id"];
									$url2="recipe-details.php?id=".$row["P_Id"];
									$url1="editRecipe.php?id=".$row["P_Id"];
								 	
									echo '<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
														<div class="productinfo text-center">
															<img src="'.$row["Image"].'" alt="" width="125" height="175" />
															<p><h2>'.$row["RecipeName"].'</h2></p>';
															
															if(@$_SESSION["Type"] == "admin"){
																echo '<a href="'.$url1.'" class="btn btn-default add-to-cart"><i class=""></i>Edit Resep</a>';
															}if(@$_SESSION["Type"] == "vip"){
																echo '<a href="'.$url3.'" class="btn btn-default add-to-cart"><i class=""></i>Lihat Resep</a>';
															}else{
																echo '<a href="'.$url2.'" class="btn btn-default add-to-cart"><i class=""></i>Lihat Resep</a>';
															}
															echo '
														</div>
														<img src="images/home/new.png" class="new" alt="" />
												</div>
											</div>
										</div>';
								}
							}
							
						?>
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include('footer.php');?> <!--Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>



<!--
AKUN SIKILAT
USERNAME= ti02
Password : laguboti96
-->