
<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<?php
	
	require_once "config.php";
	
	if(isset($_POST["addRecipe"])){
		$recipeName = $_POST["recipeName"];
		$category = $_POST["category"];
		
		
		$temp = explode(".", $_FILES["image"]["name"]);
		$extension = end($temp);
		
		$filename = basename($_FILES["image"]["name"]);
		@$filename = date(d_m_y_h_i_s)."_".$filename;
		
		$target_dir = "images/home/";
		$target_file = $target_dir.$filename;
		$tempName = $_FILES["image"]["tmp_name"];
		move_uploaded_file($tempName, $target_file);
		
		$Deskripsi = $_POST["Deskripsi"];
		$Made = $_POST["Made"];

		$result1 = "insert into recipe(RecipeName,Category,Image,Deskripsi,Made) Values('$recipeName','$category','$target_file','$Deskripsi','$Made')";
		$sql= mysqli_query($dbhandle,$result1);
		
		echo "Berhasil ditambahkan";
	}
?>

<html>
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
</head>
<body>
    <?php include('header.php');?> <!--header-->

    </br>

<div class="container body-content">
    <div class="row panel" >

        <div  class="col-lg-3 ">
            <?php include('adminMenu.php');?> <!--Admin Menu-->
        </div>
        <div class="col-lg-9 ">
            <div class="col-md-7 col-md-offset-3">
			<div class="login-panel panel panel-default  animated bounceInRight">
				<div class="panel-heading">
					<h3 class="panel-title">Add Recipe</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" role="form" method="POST" action="#">
						<fieldset>
							<div class="form-group">
								Recipe Name 
								<input class="form-control"  name="recipeName" type="text" value="" required/>
							</div>
							
							<div class="form-group">
								Category
								<select name="category" class="form-control" required/>
								<?php 
									$sql = mysqli_query($dbhandle,"SELECT Name FROM categories ORDER BY Name");
									while ($row = mysqli_fetch_array($sql)){
										echo '<option value="'.$row['Name'].'">'. $row['Name'] .'</option>';
									}
								?>
								</select>
							</div>

							<div class="form-group">
								Deskripsi 
								<input class="form-control"  name="Deskripsi" type="text" value="" required/>
							</div>

							<div class="form-group">
								Dipost Oleh 
								<input class="form-control"  name="Made" type="text" value="" required/>
							</div>
							
							<label class="btn btn-default" for="my-file-selector">
								<input id="my-file-selector" name="image" id="image" type="file" style="display:none;" required/>
								Product Photo
							</label>
							
							<input type="submit" class="btn  btn-primary btn-block" value="Add Recipe" name="addRecipe"/>
							
						</fieldset>
					</form>
				</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?php include('footer.php');?> <!--Footer-->
</body>
</html>