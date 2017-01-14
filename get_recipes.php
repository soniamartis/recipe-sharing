<?php

 session_start();
  
    
    $recipe=$_SESSION['recipe']; 
	$recipe=trim($recipe);
	
	if(!$recipe){
		exit;
	}
	if(!get_magic_quotes_gpc()){
		$recipe=addslashes($recipe);
	}
	
	$db=new mysqli('localhost','root','','recipe_site');
	
	if(mysqli_connect_errno()){
		echo 'error';
		exit;
	}
$query = "select recipe_name,page_addr,description,image_addr from recipe join recipe_image_mapping on recipe.recipe_id=recipe_image_mapping.recipe_id join image on image.image_id=recipe_image_mapping.image_id where recipe_image_mapping.recipe_id in(select recipe_id from recipe where recipe_name like '%".$recipe."%') ";
$gen_res=$db->query($query);
		

?>