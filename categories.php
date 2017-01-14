<?php
   
   session_start();
   
    $category_page=$_SESSION['recipe'];
	$db=new mysqli('localhost','root','','recipe_site');
	
	$cat_id_query="select category_type, category_id from category where category_type like '".$category_page."'";
	
	$res_id=$db->query($cat_id_query);
	$row=$res_id->fetch_assoc();
	$category_id=$row['category_id'];
	$category_type=$row['category_type'];
	$category_addr_q="select category_addr from category_pages where category_id =".$category_id." and category_page_id=1";
	$cat_addr=$db->query($category_addr_q);
	$rower=$cat_addr->fetch_assoc();
	$category_addr=$rower['category_addr'];
	$article_query="select recipe_name,description,page_addr ,image_addr from recipe join recipe_image_mapping on recipe.recipe_id=recipe_image_mapping.recipe_id join image on recipe_image_mapping.image_id=image.image_id where recipe_image_mapping.recipe_id in (select recipe_id  from recipe_category_mapping where category_id=".$category_id.")";
	$res_article=$db->query($article_query);
	
	
	
	

?>