<?php
   
  include('../categories.php');
  include('../cat_links.php');
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
		  #position:relative;
		}
		 .menu-bar{
		  position:fixed;
		  width:100%;
		  height:60px;
		  background:rgba(0,0,0,0.5);
		  margin:0;
		  z-index:10;
		 }
		 
		 .links{
		   float:right;
		   margin:0px 10px 0px 0px;
		   height:100%;
		   
		 }
		 .links li{
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
		 
		 }
		 
		 .article_container{
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
		 
		
		 .related-posts li a{
		    text-decoration:none;
			color:black;
		 }
		 
		 .related-posts h3{
		  text-align:center;
		 }
		 
		 h2{
		   text-align:center;
		   font-family:sans-serif;
		   font-weight:bold;
		 }
		 
		 .article_container{
		    height:100%;
			margin:0 ;
			width:70%;
			
		 }
		 .articles-box{
		    width:80%;
			#background:red;
			margin:0 auto;
			overflow:hidden;
		 }
		 
		
		 
		 
		 article{
		    width:100%;
			margin:0;
			height:20%;
			background:black;
			margin-top:10px;
		 }
		 
		 .image-container{
		    width:20%;
			height:95%;
			background:black;
			margin-top:3px;
			margin-left:4px;
			
			float:left;
		 }
		 
		 .recipe-metadata{
		    float:left;
			background:white;
			margin-top:3px;
			margin-left:4px;
			width:78%;
			height:95%;
			
		 }
		 .recipe-metadata h3,p{
		    margin-left:5px;
		 }
		  img{
		   width:100%;
		   height:100%;
		  }
		 article a{
		   text-decoration:none;
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
		 }
		  }
		   </style>
		   <script type = "text/javascript" >
    history.pushState(null, null, '<?php echo "../".$category_addr; ?>');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, '<?php echo "../".$category_addr; ?>');
    });
    </script>
	 </head>
	 <body>
	        <div class="menu-bar">
	     
		  <div class="links">
		  
		   <ul>  
			 <li class="not_down"><form  action="../glob.php" method="post">
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
	  <div class="article_container">
	       <h2><?php echo strtoupper($category_type);?></h2>
		   <div class="articles-box">
		    <?php
			 while($row=$res_article->fetch_assoc()){
		      print "<article><a href=\""."../redirect_to_recipe.php?link=".$row['page_addr']."\">";
			  print     " <div class=\"image-container\">";
			  print "  <img src=\""."../".$row['image_addr']."\">";
				print	"</div>";
				print	"<div class=\"recipe-metadata\">";
			    print   " <h3>".$row['recipe_name']."</h3>";
				print   "<p>".$row['description']."</p>";
				print	"</div></a>";
			   print "</article>";
			    
			 }
			 ?>
			 
			 
			 
			 
			  
		   </div>
				
	  </div>
	  <div class="related-posts">
	     
	    <h3>Related Posts</h3>
		<ul>
		    <?php
		      while($row=$res_links->fetch_assoc()){
				  print "<li><a href=\""."../redirect_to_category.php?link=".$row['category_addr']."\">".$row['category_type']."</a></li>";
			  }
		   ?>
		</ul>
	  </div>
	
	</div>
	 </body>
</html>

