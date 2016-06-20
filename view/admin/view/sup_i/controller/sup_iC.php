<?php
if (isset($_POST['id_i']) || isset($_POST['id_p']))
{
	$post = postVerif($_POST);
	$req = "DELETE FROM items WHERE id_items = $post[id_i]";
	mysqli_query($db,$req);
	$req = "DELETE FROM pics WHERE id_pics = $post[id_p]";
	mysqli_query($db,$req);
	header("Location:index.php?p=admin&l=sup_i");
}
$req = "SELECT * FROM items";
$ask = mysqli_query($db, $req);
$i = 0;
while ($d = mysqli_fetch_assoc($ask))
{
	$j = 0;
	$req_p = "SELECT * FROM pics WHERE items_id = $d[id_items]";
	$ask_p = mysqli_query($db, $req_p);
	while ($d_p = mysqli_fetch_assoc($ask_p)) 
	{
		$items[$i]['nom_p'][$j] = $d_p['nom_pics'];
		$items[$i]['id_p'][$j] = $d_p['id_pics'];
		$j++;
	}
	$items[$i]['id_i'] = $d['id_items'];
	$items[$i]['nom'] = $d['nom_items'];
	$items[$i]['desc'] = $d['desc_items'];
	$items[$i]['prix'] = $d['prix_items'];
	$i++;
}
?>