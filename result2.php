<?php

     session_start();
     $title="";
    
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
	
	$query="select page_addr from recipe where recipe_name like '".$recipe."'";
	
	
	$result= $db->query($query);
	$num_results=$result->num_rows;
	if($num_results>0){
		//get all the page info
		$q_title="select page_addr from recipe where recipe_name like '".$recipe."'";
		$res_title=$db->query($q_title);
		$row=$res_title->fetch_assoc();
		$url=$row['page_addr'];
	    header('Location: '.$url) or die();
	    
	}
	
	elseif($num_results==0){
		
		$query="select category_addr from category_pages where category_id in (select category_id from category where category_type like '".$recipe."') and category_page_id=1";
		$result= $db->query($query);
	    $num_result=$result->num_rows;
		if($num_result==0){
			$query="select region_addr from region where region_name like '".$recipe."'";
			$result=$db->query($query);
			$count=$result->num_rows;
			if($count==0){
				$query = "select recipe_name,description,image_addr from recipe join recipe_image_mapping on recipe.recipe_id=recipe_image_mapping.recipe_id join image on image.image_id=recipe_image_mapping.image_id where recipe_image_mapping.recipe_id in(select recipe_id from recipe where recipe_name like '%".$recipe."%') ";
                $gen_res=$db->query($query); 
		        $num_res=$gen_res->num_rows;
				print $num_res;
		           if($num_res>0){
			          header('Location: recipe_results.php');
					  
		             }
					 else{
						header('Location: index.php'); 
					 }
		
			}
			else{
				$region_addr_row=$result->fetch_assoc();
				$region_addr=$region_addr_row['region_addr'];
				header('Location: '.$region_addr);
			}
		}
		else{
			$row=$result->fetch_assoc();
	        $url=$row['category_addr'];
	        header('Location: '.$url);
	        die();
			
		}
		
	}
	
	
	
	$result->free();
	$db->close();
  

?>