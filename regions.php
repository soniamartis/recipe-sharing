<?php
   
   session_start();
   
    $region_page=$_SESSION['recipe'];
	$db=new mysqli('localhost','root','','recipe_site');
	
	$cat_id_query="select region_name, region_addr, region_id from region where region_name like '".$region_page."'";
	
	$res_id=$db->query($cat_id_query);
	$row=$res_id->fetch_assoc();
	$region_id=$row['region_id'];
	$region_name=$row['region_name'];
	$region_addr=$row['region_addr'];
	$article_query="select recipe_name,description,page_addr ,image_addr from recipe join recipe_image_mapping on recipe.recipe_id=recipe_image_mapping.recipe_id join image on recipe_image_mapping.image_id=image.image_id where recipe_image_mapping.recipe_id in (select recipe_id  from recipe_region_mapping where region_id=".$region_id.")";
	$res_article=$db->query($article_query);
	
	
	
	

?>