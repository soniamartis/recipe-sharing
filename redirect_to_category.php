<?php

session_start();
$addr=$_GET['link'];
print $addr;

$db=new mysqli('localhost','root','','recipe_site');
$recipe_name_query="select category_type from category where category_id in (select category_id from category_pages where category_addr like '".$addr."')";
$res_name=$db->query($recipe_name_query);
$row=$res_name->fetch_assoc();
$recipe=$row['category_type'];

$_SESSION['recipe']=$recipe;
//$db->close();
header('Location: '.$addr);

?>