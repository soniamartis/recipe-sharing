<?php

  session_start();
 if(isset($_POST['recipe'])){
	 $_SESSION['recipe']=$_POST['recipe'];
	 header('Location: result2.php') or die();
 }
 
  
  
?>