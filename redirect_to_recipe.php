<?php

session_start();
$addr=$_GET['link'];
$db=new mysqli('localhost','root','','recipe_site');
$recipe_name_query="select recipe_name from recipe where page_addr like '".$addr."'";
$res_name=$db->query($recipe_name_query);
$row=$res_name->fetch_assoc();
$recipe=$row['recipe_name'];

$_SESSION['recipe']=$recipe;
$db->close();
header('Location: '.$addr);

?>