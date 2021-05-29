<?php
session_start();
	if(isset($_POST['login']))
	{
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$password=$_POST['password'];
		
		$con=mysqli_connect('localhost','root','','cookaja/admin');
		$db=mysqli_select_db($con,'cookaja/admin');
		
		$q="SELECT * FROM user WHERE id='$id' AND nama='$nama' AND password='$password'";
		
		$result=mysqli_query($con,$q);
		$ans=mysqli_num_rows($result);
		if($ans>0)
		{
			$_SESSION['username']=$nama;
			echo"<script>window.open('index.php','_parent');</script>";
		}
		else
		{
			echo"<script>alert('Error 404');</script>";
			echo"<script>window.open('loginform.php','_self');</script>";
		}
	}

?>
