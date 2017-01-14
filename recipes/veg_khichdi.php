<?php
 
  include('../general_recipe_page.php');
  
  include('../links.php');
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
		 
		 .recipe_container{
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
		
		
		 .related-posts li a{
		    text-decoration:none;
			color:orange;
		 }
		 
		 .related-posts h3{
		  text-align:center;
		 }
		 
		 .related-posts ul{
			 list-style-type:none;
			 padding:0;
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
		 
		  #comments-section{
		   list-style-type:none;
		    word-wrap: break-word;
			margin-right:6px;
		 }
		 .change_color{
			 color:orange;
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
		 
		 .container{
		  margin-top:-150px;
		  width:90%;
		  height:auto;
		  
		 }
		 
		 .recipe_container{
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
				   var comment=$("#text_area").val();
				 
				 $.ajax({
				    type:"post",
					url:"../comments.php",
					data:"comment="+comment+"&action=addComment",
					success:function(data){
					  showComment();
					}
				 
				 });
			    
			  }
			});
			
			function showComment(){
                      $.ajax({
                        type:"post",
                        url:"../comments.php",
                        data:"action=showComment",
                        success:function(data){
                             $("#comments-section").html(data);
                        }
                      });
                    }
 
                    showComment();
			 
		 });
		 
		 
   
	</script>
   </body>
</html>