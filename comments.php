<?php
  session_start();
  $db=new mysqli('localhost','root','','recipe_site');
  $action=$_POST['action'];
 
  if(isset($_SESSION['user_id'])){
	 $user_id=$_SESSION['user_id'];  
     $recipe_id=$_SESSION['recipe_id'];
  if($action=="showComment"){
	  $query="select username ,comment,time_of_comment from user join comments on user.user_id=comments.user_id where recipe_id=$recipe_id order by time_of_comment desc" ;
      $result=$db->query($query);
	  
	  while($row=$result->fetch_assoc()){
		  echo "<li class=\"change_color\">".$row['username']."</li>";
		  echo "<li>".$row['comment']."</li>";
		  echo "<li>".$row['time_of_comment']."</li>";
	  }
  
  }
  elseif($action=="addComment"){
	  $comment=$_POST['comment'];
	  
	  $query="insert into comments(user_id,recipe_id,comment,time_of_comment)values($user_id,$recipe_id,'$comment',now())";
	  $result=$db->query($query);
	  
  }
  }
  else echo "You have to be a member to post comments";
 
?>



 