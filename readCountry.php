<?php

$db=new mysqli('localhost','root','','recipe_site');
	
	if(mysqli_connect_errno()){
		echo 'error';
		exit;
	}
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM recipe WHERE recipe_name like '" . $_POST["keyword"] . "%' ORDER BY recipe_name LIMIT 0,6";
$result = $db->query($query);

if(!empty($result)) {
?>
<ul id="recipe-list">
<?php
while($recipe=$result->fetch_assoc()) {
?>
<li onClick="selectRecipe('<?php echo $recipe["recipe_name"]; ?>');"><?php echo $recipe["recipe_name"]; ?></li>
<?php } ?>
</ul>
<?php } else{
	$query ="SELECT * FROM category WHERE category_name like '" . $_POST["keyword"] . "%' ";
$result = $db->query($query);

if(!empty($result)) {
?>
<ul id="recipe-list">
<?php
while($category=$result->fetch_assoc()) {
?>
<li onClick="selectRecipe('<?php echo $category["category_name"]; ?>');"><?php echo $category["category_name"]; ?></li>
<?php } ?>
</ul>
<?php }else{
	$query ="SELECT * FROM region WHERE region_name like '" . $_POST["keyword"] . "%' ";
$result = $db->query($query);
if(!empty($result)) {
?>
<ul id="recipe-list">
<?php
while($category=$result->fetch_assoc()) {
?>
<li onClick="selectRecipe('<?php echo $category["category_name"]; ?>');"><?php echo $category["category_name"]; ?></li>
<?php } ?>
</ul>
<?php}  ?>
<?php}} ?>

