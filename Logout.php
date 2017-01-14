<?php
  session_start();
  $_SESSION['logged']=false;
  $_SESSION['username']="";
  $_SESSION['user_id']="";
 
  header('Location: index.php');
?>