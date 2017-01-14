<?php
   
  include('../categories.php');
  include('../cat_links.php');
  
?>

<html>
     <head>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	       <style>
		    body{
		  margin:0;
		  
		  background:#232323;
		
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
		  width:90%;
			margin:0 auto;
			margin-top:-30%;
			margin-bottom:10%;
			height:auto;
			overflow:hidden;
			background:white;
			border-radius:5%;
		 
		 }
		 
		 .article_container{
		   
		   float:left;
		   width:70%;
		   padding-bottom:20px;
		 }
		 
		.related-posts{
		  float:right;
		  width:29.6%;
		  padding-bottom:20px;
		  overflow:hidden;
		}
		 
		 
		 .related-posts ul{
			 list-style-type:none;
			 padding:0;
		 }
		 
		
		 .related-posts li a{
		    text-decoration:none;
			color:orange;
		 }
		 
		 .related-posts h3{
		  text-align:center;
		 }
		 
		 h2{
		   text-align:center;
		   font-family:sans-serif;
		   font-weight:bold;
		 }
		 
		
		 .articles-box{
		    width:80%;
			#background:red;
			margin:0 auto;
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
		 
		   #comments-section{
		   list-style-type:none;
		    word-wrap: break-word;
			margin-right:6px;
		 }
		 
		  @media screen and (max-width: 750px){
			  
			  body{
				  height:100%;
				  width:100%;
				  
			  }
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
		.container{
		  margin-top:-150px;
		  width:90%;
		  height:auto;
		  
		 }
		 
		 .article_container{
		   display:block;                    
		   width:100%;
		   height:auto;
		  background:white;
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
		 
		 
		  .articles-box{
		    width:95%;
			
		 }
		 
		 article{
		    width:100%;
			margin:0;
			height:30%;
			background:red;
			margin-top:10px;
			overflow:hidden;
		 }
		 
		 .image-container{
		    width:100%;
			height:100%;
			margin:0 auto;
			
		 }
		 
		 /* .recipe-metadata{
		    float:left;
			background:white;
			margin:0;
			width:78%;
			height:45%;
			
			
		 }
		 .recipe-metadata h3{
		    margin-left:3px;
		 }
		 
		 .recipe-metadata p{
			 display:none;
		 }
		 */
		  img{
		   opacity:0.5;
		  
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
		    <li class="not_down" id="home"><a href="../index.php">Home</a></li>
			<li class="down"><?php if($_SESSION['logged']==true){
				 echo '<a href="#" class="down">'.$_SESSION['username'].'</a></li>';
			 }
			 elseif($_SESSION['logged']==false){
				 echo '<a href="../LoginOrSignUp.php" class="down">Login</a></li>';
			 }?>
			 <li class="down"><?php if($_SESSION['logged']==true){
				 echo '<a href="../Logout.php" class="down">Logout</a></li>';
			 }
			 elseif($_SESSION['logged']==false){
				 echo '<a href="../LoginOrSignUp.php" class="down">SignUp</a></li>';
			 }?>
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
			  print "  <img src=\""."../".$row['image_addr']."\" alt=\"".$row['recipe_name']."\">";
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
		 <div class="comments">
		<h3>Comments</h3>
		<textarea rows="4" cols="40" placeholder="Leave a comment..." id="text_area"></textarea>
		<ul id="comments-section">
		</ul>
		
		</div>
	  </div>
	
	</div>
	   <script>
	     $(document).ready(function(){
			$(document).keypress(function(e){
			  if(e.which==13){
			    $("#comments-section").prepend("<li>"+$("#text_area").val()+"</li>");
				$("textarea").attr("placeholder","Leave a comment....");
			  }
			})
			 
		 });
		 
		 
   
	</script>
	 </body>
</html>

