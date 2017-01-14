<?php
  include('../general_recipe_page.php');
  
  include('../links.php');
?>

<html>
   <head>
       <style>
	      body{
		  margin:0;
		  width:100%;
		  height:100%;
		  background:#232323;
		  overflow-x:hidden;#hides the horizontal scrollbar
		 
		}
		 .menu-bar{
		  position:fixed;
		  width:100%;
		  height:60px;
		  background:rgba(0,0,0,0.5);
		  margin:0;
		  z-index:6;
		 }
		 
		 .links{
		   float:right;
		   margin:0px 10px 0px 0px;
		   height:100%;
		   
		 }
		 .down, .not_down{
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
		  background:url("../images/background3.jpg");
		  width:100%;
		  background-size:cover;
		  #background-position:center;
		  background-repeat:no-repeat ;
		  height:500px; /*this solved the problem of img for me*/
		 
		  z-index:1;
		 }
		 
		 .container{
		  height:100%;
		  margin-top:-25%;
		  background:white; 
		  margin-left:auto;
		  margin-right:auto;
		  margin-bottom:50px;
		  width:80%;
		  z-index:5;
		  border-radius:5%;
		 }
		 
		 .recipe_container{
		   float:left;
		   width:70%;
		   height:100%;
		   margin:0;
		   overflow:auto; 
		 }
		 
		 .related-posts{
		   float:right;
		   width:29%;
		   margin:0;
		   height:100%;
		   border-left:2px solid black;
		   overflow:auto;
		 }
		 
		 .related-posts ul
         {
           list-style-type: none;
         }
		 
		
		 .related-posts li a{
		    text-decoration:none;
			color:black;
		 }
		 
		 .related-posts h3{
		  text-align:center;
		 }
		 
		 
		 .img-class{
		    width:100%;
			margin:0;
			height:300px;
		 }
		 
		 img{
		   height:100%;
		   width:80%;
		   margin:0 auto;
		   display:block;
		 }
		 
		 h2{
		   text-align:center;
		   font-family:sans-serif;
		   font-weight:bold;
		 }
		 
		 .recipe-writeup{
		   width:80%;
		   margin:0 auto;
		  
		 }
		 
		 .recipe-writeup p{
		   margin-left:0;
		 }
		 
		  @media screen and (max-width: 700px){
			 .menu-bar{
				 height:100px;
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
			margin-left:5px;
			position:relative;
				top:10px;
				display:inline;
		 }
		 
		  header{
		  height:380px; 
		 }
		 
		 .container{
		  margin-top:-40%;
		  width:90%;
		  
		 }
		 
		 .recipe_container{
		   display:block;                    
		   width:100%;
		  
		   border-radius:5%;
		 }
		 
		  .related-posts{
		  display:block;
		   width:100%;
		   margin:0;
		   height:auto;
		   background:white;
		   border-radius:5%;
		   margin-top:10px;
		  margin-bottom:20px;
		   
		 }
		 
		 .img-class{
		    width:100%;
			margin:0;
			height:200px;
		 }
		 
		 img{
		   height:100%;
		   width:98%;
		   margin:0 auto;
		   display:block;
		 }
		 
		  .recipe-writeup{
		   width:98%;
		  
		 }
		 
		  }
		  
		  
	   </style>
	<script type = "text/javascript" >
    history.pushState(null, null, '<?php echo "../".$page_addr;?>');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, '<?php echo "../".$page_addr;?>');
    });
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
		    <li class="down"><a href="../index.php">Home</a></li>
			 <li class="down"><a href="../LoginOrSignUp.php">Login</a></li>
			 <li class="down"><a href="../LoginOrSignUp.php">SignUp</a></li>
		  </ul>
		  </div>
	</div>
	<header>
	    
	</header>
	 
	<div class="container">
	  <div class="recipe_container">
	      <h2><?php echo strtoupper($title);?></h2>
		   <div class="img-class">
		      <img src="<?php print "../$image_src";?>">
			 
		   </div>
		   <div class="recipe-writeup">
		        <p><?php echo $description;?></p>
			    <h3>Ingredients</h3>
			    <ul>
			      <?php
				     for($i=0;$i<count($rows);$i++){
						print "<li>$rows[$i]</li>";
					 }
				  ?>
			  </ul>
			  
			  <h3>How to make <?php echo $title;?></h3>
			  <ul>
			      <?php
				    for($i=0;$i<count($step_rows);$i++){
						print "<p><li>$step_rows[$i]</li></p>";
					}
				  
				  ?>
			  <ul>
		   </div>
	  </div>
	  <div class="related-posts">
	     
	    <h3>Related Posts</h3>
		<ul>
		   <?php
		      while($row=$res_links->fetch_assoc()){
				  print "<li><a href=\""."../redirect_to_recipe.php?link=".$row['page_addr']."\">".$row['recipe_name']."</a></li>";
			  }
		   ?>
		</ul>
	  </div>
	
	</div>
	
	
   </body>
</html>