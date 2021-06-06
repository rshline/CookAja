<?php
	session_start();
	if($_SESSION["Type"] == "admin"){
		
	}
	else{
		header('location:login.php');
	}
	
?>

<?php
	
	$id=$_GET['id'];
	require_once "config.php";
	
	if(isset($_POST['update']))
		{
			$id=$_GET['id'];
			$recipeName = $_POST["recipeName"];
			$category = $_POST["category"];
			
			require_once "config.php";
			
			$temp = explode(".", $_FILES["image"]["name"]);
			$extension = end($temp);
			
			$filename = basename($_FILES["image"]["name"]);
			@$filename2 = date(d_m_y_h_i_s)."_".$filename;
			
			$target_dir = "images/products/";
			$target_file = $target_dir.$filename2;
			$tempName = $_FILES["image"]["tmp_name"];
				
			if($filename == null){
				
				$result = "update recipe set RecipeName='$recipeName', Category='$category' where P_Id='$id'";
				$sql = mysqli_query($dbhandle,$result);
				
			}
			else{
				//delete previous image -------
				$result = "Select * from recipe where P_Id='$id'";
				$query = mysqli_query($dbhandle,$result);
				$row=mysqli_fetch_array($query);
				unlink($row["Image"]);
				//-----------------------------
				
				move_uploaded_file($tempName, $target_file);
				
				$result = "update recipe set RecipeName='$recipeName', Category='$category', Image='$target_file' where P_Id='$id'";
				$sql = mysqli_query($dbhandle,$result);
			}
			
			header('Location: recipeList.php');
		}
		else 
		{
			require_once "config.php";
			
			$result = "Select * from recipe where P_Id='$id'";
			$query = mysqli_query($dbhandle,$result);
			
			$row=mysqli_fetch_array($query);
			
			
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
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Resep</h3>
				</div>
				<div class="panel-body">
					<form enctype="multipart/form-data" role="form" method="POST" action="#">
						<fieldset>
							<div class="form-group">
								Recipe Name 
								<input class="form-control"  name="recipeName" type="text" value="<?php echo $row["RecipeName"];?>" required/>
							</div>
							
							<div class="form-group">
								Category
								<select name="category" class="form-control" required/>
								<?php 
									$sql12 = mysqli_query($dbhandle,"SELECT Name FROM categories ORDER BY Name");
									while ($row12 = mysqli_fetch_array($sql12)){
										echo '<option value="'.$row12['Name'].'">'. $row12['Name'] .'</option>';
									}
								?>
								</select>
							</div>
							
							
							<img src="<?php echo $row["Image"];?>" width="100" height="100" alt="image not found">
							<label class="btn btn-default" for="my-file-selector">
								<input id="my-file-selector" name="image" id="image" type="file" style="display:none;"/>
								Change Photo
							</label>
							
							<input type="submit" class="btn  btn-primary btn-block" value="Update" name="update"/>
							
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