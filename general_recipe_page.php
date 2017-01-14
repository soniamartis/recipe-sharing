<?php
   
	session_start();
	if(!isset($_SESSION['recipe'])){
		header('Location: ../index.php');
		exit;
	}
	$recipe=$_SESSION['recipe'];
	$recipe=trim($recipe);
	
	if(!$recipe){
		exit;
	}
	if(!get_magic_quotes_gpc()){
		$recipe=addslashes($recipe);
	}
	$db=new mysqli('localhost','root','','recipe_site');
	
	
	
	
		$q_title="select recipe_name,recipe_id,page_addr, description from recipe where recipe_name like '".$recipe."'";
		$res_title=$db->query($q_title);
		
		$row=$res_title->fetch_assoc();
		$title=$row['recipe_name'];
		$id=$row['recipe_id'];
		$_SESSION['recipe_id']=$id;
		$description=$row['description'];
		$page_addr=$row['page_addr'];
		$res_title->free();
		$ingred_query="select ingred_name from ingredients where ingred_id in (select ingred_id from recipe_ingredient_mapping where recipe_id=".$id.")";
	    $res_ingred=$db->query($ingred_query);
		$rows = array();
         while($row = $res_ingred->fetch_assoc()) {
             $rows[] = $row['ingred_name'];
        }
		$res_ingred->free();
		$step_query="select step from steps where recipe_id=".$id."";
		$res_step=$db->query($step_query);
		$step_rows=array();
		while($row = $res_step->fetch_assoc()) {
             $step_rows[] = $row['step'];
        } 
	    $res_step->free();
	
	    $image_query="select image_addr from image where image_id in (select image_id from recipe_image_mapping where recipe_id=".$id.")";
		$res_image=$db->query($image_query);
		$image_row=$res_image->fetch_assoc();
		$image_src=$image_row['image_addr'];
		//$image_desc=$image_row['image_description'];
	
	
	//$db->close();
  

?>



