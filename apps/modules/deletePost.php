<?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
 require('views/deletePost.html');

if(isset($_POST['idPost']))
{
	$idPost = intval($_POST['idPost']);
	$deletePost = "DELETE FROM livre_or WHERE id_livre_or = '".$idPost."'";
	$requestDelete = mysqli_query($db, $deletePost);
	header("Location:index.php?$url");
}
?>