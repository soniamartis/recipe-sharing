<?php
  session_start();
 $_SESSION['logged']=false;
  if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['mail_addr']) && isset($_POST['username']) && isset($_POST['password'])){
	  $db=new mysqli('localhost','root','','recipe_site');
	  
	  if(mysqli_connect_errno()){
		echo 'error';
		exit;
	}
	$first_name=trim($_POST['first_name']);
	$last_name=trim($_POST['last_name']);
	$mail_addr=trim($_POST['mail_addr']);
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	
	if(!get_magic_quotes_gpc()){
		$first_name=addslashes($first_name);
		$last_name=addslashes($last_name);
		$mail_addr=addslashes($mail_addr);
		$username=addslashes($username);
		$password=addslashes($password);
	}
	
	$query="insert into user(username,password,email_id,first_name,last_name)values('".$username."','".md5($password)."','".$mail_addr."','".$first_name."','".$last_name."')";
	$result=$db->query($query);
	$get_user_id="select user_id from user where username like '".$username."'";
	$res=$db->query($get_user_id);
	$num_res=$res->num_rows;
	if($num_res==1){
		echo "SignUP sucessful";
		$user_id_row=$res->fetch_assoc();
		$user_id=$user_id_row['user_id'];
		$_SESSION['user_id']=$user_id;
		$_SESSION['username']=stripslashes($username);
		$_SESSION['logged']=true;
		
	}
	else{
		echo "One of the fields are already present. Please gry again";
		exit;
	}
  }
  else{
	  echo "one of the fields are missing";
  }

?>