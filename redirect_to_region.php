<?php

session_start();
$addr=$_GET['link'];
print $addr;

$db=new mysqli('localhost','root','','recipe_site');
$recipe_name_query="select region_name from region where region_addr like '".$addr."'";
$res_name=$db->query($recipe_name_query);
$row=$res_name->fetch_assoc();
$recipe=$row['region_name'];

$_SESSION['recipe']=$recipe;
//$db->close();
header('Location: '.$addr);

?>