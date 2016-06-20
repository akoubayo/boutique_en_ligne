<?php
if (isset($_POST['id_i']))
{
	$post = postVerif($_POST);
	$req = "DELETE FROM cat WHERE id_cat = $_POST[id_i]";
	mysqli_query($db,$req);
	header("Location:index.php?p=admin&l=$_GET[l]");
}
$req = "SELECT * FROM cat";
$ask = mysqli_query($db, $req);
$i = 0;
while ($d = mysqli_fetch_assoc($ask))
{
	$items[$i]['id_i'] = $d['id_cat'];
	$items[$i]['nom'] = $d['nom_cat'];
	$i++;
}
?>