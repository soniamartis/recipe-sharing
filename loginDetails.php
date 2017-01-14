<?php

session_start();
  $_SESSION['logged']=false;
if(isset($_POST['username']) && isset($_POST['password'])){
	$db=new mysqli('localhost','root','','recipe_site');
	  if(mysqli_connect_errno()){
		echo 'error';
		exit;
	}
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	
	if(!get_magic_quotes_gpc()){
		$username=addslashes($username);
		$password=addslashes($password);
	}
	
	$query="select user_id from user where username = '".$username."' and password='".md5($password)."'";
	$result=$db->query($query);
	$res=$result->num_rows;
	if($res==1){
		
		$get_id=$result->fetch_assoc();
		$user_id=$get_id['user_id'];
		$_SESSION['user_id']=$user_id;
		$_SESSION['username']=$username;
		$_SESSION['logged']=true;
		header('Location: index.php');
	}
	else if($res==0){
		echo "You are not a member of Bhukad's Kitchen. To be a member please signUP";
		exit;
	}
}
else {
	   echo "One or both fields are missing";
	   exit;
}
?>