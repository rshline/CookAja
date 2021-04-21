<?php
	
	ob_start();
	session_start();
	include_once 'config.php';

	// Connect to server and select databse.
	mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 		
	mysqli_select_db("$cookaja")or die("cannot select DB");

	// Define $myusername and $mypassword 
	$myusername = $_POST['myusername']; 
	$mypassword = $_POST['mypassword']; 
	$myemail = $_POST['myemail']; 
	
	// To protect MySQL injection
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myemail = stripslashes($myemail);	
	$myusername = mysqli_real_escape_string($myusername);	
	$mypassword = mysqli_real_escape_string($mypassword);
	$myemail = mysqli_real_escape_string($myemail);
//	Hashing the password using SHA1 and salt="batman is here"
	$mypassword = sha1($mypassword.$salt);
	$sql="SELECT * FROM $tbl_name WHERE email='$myemail'";		
	$result=mysqli_query($sql);

	$count=mysqli_num_rows($result);
	if($count != 0){
		echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Email ID already exists</div>";
	}
	else {
	
		
		$sql = "INSERT INTO $tbl_name (`id`, `username`, `password`,`email`) VALUES (NULL,'$myusername', '$mypassword', '$myemail')";
		mysqli_query($sql) or die(mysqli_error());
		$_SESSION['username'] = $myusername;
		$_SESSION['password'] = $mypassword;
        echo "true";
   
}

	ob_end_flush();
?>
