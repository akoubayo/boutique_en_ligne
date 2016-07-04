<?php
$req = "SELECT * FROM cat";
$ask = mysqli_query($db, $req);

if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['id']) && !empty($_POST['id']))
{
	$post = postVerif($_POST);
	$req = "UPDATE cat SET nom_cat = '$post[nom]' WHERE id_cat = $post[id]";
	mysqli_query($db, $req);
	header("location:index.php?p=admin&l=mod_c");
}
?>