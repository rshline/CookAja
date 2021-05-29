<?php
	
	ob_start();
	session_start();
	include_once 'config.php';

	// Connect to server and select databse.
	mysqli_connect("$host", "$nama", "$password")or die("cannot connect"); 		
	mysqli_select_db("$cookaja")or die("cannot select DB");

	// Define $myusername and $mypassword 
	$nama = $_POST['nama']; 
	$password = $_POST['password']; 
	$email = $_POST['email']; 
	
	// To protect MySQL injection
	$nama = stripslashes($nama);
	$password = stripslashes($password);
	$email = stripslashes($email);	
	$nama = mysqli_real_escape_string($nama);	
	$password = mysqli_real_escape_string($password);
	$email = mysqli_real_escape_string($email);
//	Hashing the password using SHA1 and salt="batman is here"
	$password = sha1($password.$salt);
	$sql="SELECT * FROM $tbl_name WHERE email='$email'";		
	$result=mysqli_query($sql);

	$count=mysqli_num_rows($result);
	if($count != 0){
		echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Email ID already exists</div>";
	}
	else {
	
		
		$sql = "INSERT INTO $user (`id`, `username`, `password`,`email`) VALUES (NULL,'$nama', '$password', '$email')";
		mysqli_query($sql) or die(mysqli_error());
		$_SESSION['nama'] = $nama;
		$_SESSION['password'] = $password;
        echo "true";
   
}

	ob_end_flush();
?>
