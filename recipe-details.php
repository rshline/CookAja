<?php
	require_once "config.php";
	session_start();
	$id=$_GET["id"];
	$sql="SELECT * FROM recipe WHERE P_Id='$id'";
	$result = mysqli_query($dbhandle,$sql);
	$row=mysqli_fetch_array($result);

?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Recipe Details | CookAja.com</title>
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
	<?php include('header.php');?> <!--header-->
	
	<section>
	
	
		<div class="container">
		
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-4">
							<div class="view-product">
								<img src="<?php echo $row["Image"];?>" alt="" />
							</div>
						</div>
						<form action="#" method="POST">
							<div class="col-sm-8">

								<div class="product-information"><!--/product-information-->
									<h2><b><?php echo $row["RecipeName"];?></b></h2>
									<p><b>Di Posting Oleh</b> : <i><?php echo $row["Made"];?></i></p>
									<img src="images/product-details/rating.png" alt="">
									<span>
									</span>
									<br>
									<br>
									<br>
									<p><b>Bahan & Cara Masak</b></p><?php echo $row["Deskripsi"];?>
									<br>

<!--Code untuk Rating-->
<style>
li{display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.highlight, .selected {color:#F4B30A;text-shadow: 0 0 1px black;}
</style>
	<br>
    <h5 text-align="center">Rating Resep</h5>
    <input type="hidden" name="rating" id="rating" />
    <ul onMouseOut="resetRating();">
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
      <li onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
    </ul>

    <script>
function highlightStar(obj) {
	removeHighlight();		
	$('li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $("li").index(obj)) {
			return false;	
		}
	});
}

function removeHighlight() {
	$('li').removeClass('selected');
	$('li').removeClass('highlight');
}

function addRating(obj) {
	$('li').each(function(index) {
		$(this).addClass('selected');
		$('#rating').val((index+1));
		if(index == $("li").index(obj)) {
			return false;	
		}
	});
}

function resetRating() {
	if($("#rating").val()) {
		$('li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $("#rating").val()) {
				return false;	
			}
		});
	}
}
</script>

<!--Code untuk Tabel Komentar-->
<br>			
<form id="form1" name="form1" method="post" action="#">
  <table width="400" border="1">
    <tr>
      <td colspan="2"><strong>Berilah Ulasan Setelah Anda Mencoba Memasaknya Hanya di <i>CookAja.com</i></strong></td>
    </tr>
    <tr>
      <td width="100">User</td>
      <td width="200"><label for="textfield"></label>
      <input type="text" name="nama" id="nama" /></td>
    </tr>
    <tr>
      <td>Nama Resep</td>
      <td><label for="textfield"></label>
      <input type="text" name="website" id="website" /></td>
    </tr>
    <tr>
      <td>Komentar</td>
      <td><label for="textfield"></label>
        <label for="textarea"></label>
      <textarea name="pesan" id="pesan"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="Submit"></label>
      <input type="submit" name="Submit" value="Submit" id="Submit" />
      <label for="label"></label>
      <input type="reset" name="Submit2" value="Reset" id="label" /></td>
    </tr>
  </table>
  <br>
  <p><b>Ulasan Resep <i>User CookAja</i></b> : </p>
</form>

<?php
//konfigurasi koneksi
mysqli_connect ("localhost","root","");
mysqli_select_db ($dbhandle,"cookaja");

//inisialisasi tanggal
$tanggal = date ("Ymd");
//inisialisasi waktu
$time = date ("H:i:s");

if(isset($_POST['Submit'])){
//query untuk menambah data ke dalam tabel
$query = mysqli_query ($dbhandle,"INSERT INTO tb_komentar(nama, website, pesan, tanggal, time) values ('$_POST[nama]', '$_POST[website]', '$_POST[pesan]', '$tanggal','$time')");
}
//query untuk menampilkan data ke dalam tabel
$query = mysqli_query ($dbhandle,"SELECT * FROM tb_komentar ORDER BY time && tanggal desc");

while ($d = mysqli_fetch_array ($query))
{
$psn = $d['pesan'];
echo "<table>";
echo "<tr><td><b>$d[nama]</b>";
echo "<tr><td><b>Resep</b>  <i>$d[website]</i></td></tr>";
echo "<tr><td>Komentar : $psn";
echo "<tr><td align=left>$d[time]: $d[tanggal]</td></tr></table><hr>";
}
?>


									<a href="google.com"><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</div>
						</form>x	
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
	</section>
	
	<?php include('footer.php');?> <!--Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>