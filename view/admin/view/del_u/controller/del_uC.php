<?php
if (isset($_POST['id_i']))
{
	$post = postVerif($_POST);
	$req = "DELETE FROM user WHERE id_user = $_POST[id_i]";
	mysqli_query($db,$req);
	header("Location:index.php?p=admin&l=del_u");
}
$req = "SELECT * FROM user";
$ask = mysqli_query($db, $req);
$i = 0;
while ($d = mysqli_fetch_assoc($ask))
{
	$items[$i]['id_i'] = $d['id_user'];
	$items[$i]['nom'] = $d['pseudo'];
	$items[$i]['mail'] = $d['mail'];
	$items[$i]['admin'] = $d['admin'];
	$i++;
}
?>