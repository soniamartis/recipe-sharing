<?php
 session_start();
 
 if(!isset($_SESSION['logged'])){
	 $_SESSION['logged']=false;
 }
 
  $db=new mysqli('localhost','root','','recipe_site');
  
  function getValues($category_id){
	  global $db;
	  $query ="select recipe_name, page_addr from recipe where recipe_id in(select recipe_id from recipe_category_mapping where category_id =".$category_id." )order by date_of_upload desc limit 10";
                       $res_q=$db->query($query);
					   return $res_q;
  }
  
  function getLatestRecipes(){
	  global $db;
	  $query="select recipe_name,page_addr,image_addr ,description from recipe join recipe_image_mapping on recipe.recipe_id=recipe_image_mapping.recipe_id join image on image.image_id=recipe_image_mapping.image_id order by date_of_upload desc limit 3";
	  $res_q=$db->query($query);
	  return $res_q;
  }
 
?>
<html>
  <head>
      <title>Bhukad's Kitchen
	  </title>
	  <link href='https://fonts.googleapis.com/css?family=Londrina+Shadow' rel='stylesheet' type='text/css'>
	  <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	  <style>
	    body{
		  margin:0;
		  width:100%;
		  height:100%;
		  background:#232323;
		  
		  overflow-x:hidden;
		}
		 .menu-bar{
		  position:fixed;
		  width:100%;
		  height:60px;
		  background:rgba(0,0,0,0.5);
		  margin:0;
		  z-index:4;
		 }
		 
		 .links{
		   float:right;
		   margin:0px 10px 0px 0px;
		   height:100%;
		   
		 }
		  li{
		 display:inline;
		 }
		 
		 .links form{
		   display:inline;
		 }
		 
		 .links form input{
		  padding:5px 10px 5px 5px;
		   font-family:sans-serif;
		   font-size:20px;
		   color:rgba(211,211,211,1);
		 }
		 
		 
		.links a{
		  padding:5px 10px;
		  font-family:sans-serif;
		  font-size:20px;
		  text-decoration:none;
		  color:rgba(255,255,255,1);
		  background:#1a52ff;
		 }
		 
	     header{
		  background:url("images/background3.jpg");
		  width:100%;
		  background-size:cover;
		  #background-position:center;
		  background-repeat:no-repeat ;
		  height:500px; /*this solved the problem of img for me*/
		  position:relative;
		  z-index:1;
		 }
		  .heading{
		      
			  text-align:center;
			  position:absolute;
			  top:40%;
			  left:40%;
			  right:40%;
		 }
		 
		.heading h1,h2{
		 font-family: 'Londrina Shadow', cursive;
		 font-size:30px;
		 margin:5px 0px 5px 0px;
		 color:white;
		 }
		
		 
		/* .container{
		   width:100%;
		   margin:20px 0px 0px 60px;
		   height:400px;
		   
		  }
		  */
		 
		 
		 .todays-highlights{
		   width:100%;
		   height:75px;
		   margin-top:40px;
		   background:rgba(255,255,255,1);
		   position:relative;
		   
		 }
		 
		 .todays-highlights h2{
		    position:absolute;
		   top:10%;
		   left:40%;
		   
		   font-family: 'Indie Flower', cursive;
		   font-size:30px;
		   padding:0px;
		   margin:0px;
		   color:black;
		 }
		   
		   .highlight-items{
		     margin:40 auto 0 auto;
			 width:85%;
			 
			 
			 height:300px;
			 
			 
		   }
		   
		    .highlight-item{
		     float:left;
			 width:30%;
			 position:relative;
			 border-radius:12px;
			 height:100%;
			 margin:6px;
			 background-repeat:no-repeat;
			 background-size:cover;
			 
		   }
		   
		   .highlight-item p{
		     line-height:150%;
		   }
		  /* #first{
		     background:url("images/uttapam.jpg");
			 
		   }
		   
		   #second{
		      background:url("images/chole.jpg");
			 
		   }
		   
		    #third{
		      background:url("images/snack.jpg");
			 
		   }*/
		 
		 .text{
		   width:100%;
		   position:absolute;
		   bottom:0;
		   height:35%;
		   background:black;
		   color: rgba(255,255,255,1);
           background: black;
           background: linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
           background: -webkit-linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
           background: -moz-linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
           #padding: 10px;
           line-height: 28px;
           text-align: justify;
		   border-radius:12px;
		   overflow:hidden;
		 }
		 
		 .text h3{
		 margin:5px 0px 10px 10px;
		 line-height:100%;
		 }
		 
		 .text h3 a{
		   text-decoration:none;
		   color:white;
		   font-weight:bold;
		   font-family:'arial';
		 }
		 
		 .text p{
		 margin:5px 10px 0px 10px;
		 line-height:100%;
		 }
		 
		 .categories{
		   width:85%;
		   height:900px;
		   margin:40 auto 0 auto;
		   
		   
		 }
		 
		 .cat{
		   float:left;
		   width:30%;
		   height:30%;
		   background:black;
		   margin:6px;
		   border-radius:12px;
		   position:relative;
		 }
		 
		 #cat1{
		   background:url("images/sherbet.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		  #cat2{
		   background:url("images/pickle.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat3{
		   background:url("images/sweets.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat4{
		   background:url("images/salad.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat5{
		   background:url("images/dosa.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		  #cat6{
		   background:url("images/rice.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat7{
		   background:url("images/curry.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat8{
		   background:url("images/soup.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 #cat9{
		   background:url("images/snack1.jpg");
		   background-position:center;
		   background-size:cover;
		 }
		 
		 .cat .text a{
		 text-decoration:none;
		 color:white;
		 }
		 
		 .cat .text li{
		 display:inline;
		 margin-right:5px;
		 line-height:180%;
		 
		 
		 }
		 .cat a{
		 
		 padding:2;
		 }
		 
		 .cat ul{
		   margin:2;
		   list-style-type:none;
		   padding:0;
		 }
		 
		 .go-up{
		   height:100%;
		 }
		 
		 @media screen and (max-width: 700px){
			 .menu-bar{
				 height:130px;
				 width:100%;
				 
			 }
			 
			 .links{
				
				margin:0;
			 }
			 
			.links ul{
				
				text-align:center;
				margin-left:-20px;
				margin-right:20px;
			}
			 
			 header{
				 height:380px;
			 }
			 
			  .not_down{
		        display:block;
		 }
		 
		 .down{
			margin-left:0.3px;
			position:relative;
				top:10px;
		 }
		 
		 #home{
			 margin-top:8px;
			 margin-bottom:-8px;
		 }
		 
		 .heading{
			
			right:20%;
			left:20%;
			
		 }
		 
		  .todays-highlights{
		   
		   height:50px;
		   margin-top:10px;
		   
		   
		 }
		 
		 .todays-highlights h2{
		    
		   top:18%;
		   left:20%;
		   right:20%;
		    font-size:20px;
		 }
		 
		   .highlight-items{
		     margin:10 auto 0 auto;
			 width:85%;
			 height:750px;
			 
		   }
		 
		 .highlight-item{
			 width:100%;
			 height:32.5%;
			 margin :0;
			 margin-bottom:10px;
		   }
		 
		
		   
		 .highlight-item p{
		     line-height:100%;
		   }  
		   
		   .categories{
		   width:85%;
		   height:750px;
		  
		   
		   
		 }
		 
		 .cat{
		   
		   width:100%;
		  
		 }
		 
		 }
		 
	  </style>
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
	    
	  </script>
  </head>
  <body>
   
	
       <div class="menu-bar">
	     
		  <div class="links">
		  
		   <ul>  
			 <li class="not_down"><form  action="glob.php" method="post">
				       <input type="text" placeholder="Search for recipes" name="recipe">
					      
					   </input>
				  </form>
			  </li>
		    <li class="not_down" id="home"><a href="#">Home</a></li>
			 <li class="down"><?php if($_SESSION['logged']==true){
				 echo '<a href="#" class="down">'.$_SESSION['username'].'</a></li>';
			 }
			 else{
				 echo '<a href="LoginOrSignUp.php" class="down">Login</a></li>';
			 }?>
			 <li class="down"><?php if($_SESSION['logged']==true){
				 echo '<a href="Logout.php" class="down">Logout</a></li>';
			 }
			 else{
				 echo '<a href="LoginOrSignUp.php" class="down">SignUp</a></li>';
			 }?>
		  </ul>
		  </div>
	</div>
	 <header>
	    <div class="heading">
	      <h1>Bhukad's Kitchen Recipes</h1>
		  <h2>A Complete Indian Delight</h2>
		</div> 
	</header>
	<div class="todays-highlights">
	    <h2>Today's Highlights</h2>
	</div>
	
	<div class="highlight-items">
	<?php
	  $res_q=getLatestRecipes();
	  while($row=$res_q->fetch_assoc()){
	print "<a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\"><div  class=\"highlight-item\" style=\"background-image:url(".$row['image_addr'].")\">";
	print     " <div class=\"text\">";
		print " <h3>".$row['recipe_name']."</h3>";
		print "<p>".$row['description']."</p>";
		print " </div>";
	print "</div></a>";
	  }
	
	?>
	</div>
	<div class="todays-highlights">
	    <h2>Categories</h2>
	</div>
	
	<div class="categories">
	    <div class="cat" id="cat1">
		        <div class="text">
		           <h3><a href="#">Sherbet Recipes</a></h3>
			       <ul>
				       <?php
					   
                       $res_q=getValues(11);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				     
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat2">
		      <div class="text">
		           <h3><a href="#">Pickle Recipes</a></h3>
			       <ul>
				     
					  <?php
					   
                       $res_q=getValues(10);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				      
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat3">
		      <div class="text">
		           <h3><a href="#">Sweets Recipes</a></h3>
				   <ul>
				     <?php
					   
                       $res_q=getValues(9);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				   </ul>
			       
		       </div>
		</div>
		<div class="cat" id="cat4">
		      <div class="text">
		           <h3><a href="#">Salad recipes</a></h3>
			       <ul>
				       <?php
					   
                       $res_q=getValues(12);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				       
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat5">
		       <div class="text">
		           <h3><a href="#">Dosa Recipes</a></h3>
			       <ul>
				       <?php
					   
                       $res_q=getValues(15);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				       
				      
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat6">
		      <div class="text">
		           <h3><a href="#">Rice Recipes</a></h3>
			       <ul>
				          <?php
					  
                       $res_q=getValues(16);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat7">
		      <div class="text">
		           <h3><a href="#">Gravy Recipes</a></h3>
			       <ul>
					   <?php
					   
                       $res_q=getValues(17);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat8">
		      <div class="text">
		           <h3><a href="#">Soup Recipes</a></h3>
			        <ul>
					    <?php
					   
                       $res_q=getValues(18);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				   </ul>
		       </div>
		</div>
		<div class="cat" id="cat9">
		      <div class="text">
		           <h3><a href="#">Snacks Recipes</a></h3>
			       <ul>
					   <?php
					   
                       $res_q=getValues(3);
					    while($row=$res_q->fetch_assoc()){
		                    print "<li><a href=\""."redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
	                    }
					 ?>
				   </ul>
		       </div>
		</div>
		
	
	</div>
    <script>
	     $(document).ready(function(){
		  $('.text').mouseenter(function(){
		    $(this).toggleClass('go-up');
		  });
		});
		
		
		
	</script>
	
  </body>
</html>