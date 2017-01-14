<?php

   //session_start();
  /* $recipe=$_SESSION['recipe'];
   $recipe=trim($recipe);
	
	if(!$recipe){
		exit;
	}
	if(!get_magic_quotes_gpc()){
		$recipe=addslashes($recipe);
	}*/
	
	//$db=new mysqli('localhost','root','','recipe_site');
	
	/*if(mysqli_connect_errno()){
		echo 'error';
		exit;
	}*/
	
	//$recipe_id_query="select recipe_id from recipe where recipe_name like '".$recipe."'";
	//$res_id=$db->query($recipe_id_query);
	//$row=$res_id->fetch_assoc();
	//$recipe_id=$row['recipe_id'];
	$links_query="select recipe_name, page_addr from recipe where recipe_id in (select recipe_id from recipe_category_mapping where category_id in (select category_id from recipe_category_mapping where recipe_id=".$id."))and recipe_id!=".$id."";
	$res_links=$db->query($links_query);
	
	
   
?>