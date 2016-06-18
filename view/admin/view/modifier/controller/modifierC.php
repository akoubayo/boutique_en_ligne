<?php
if(isset($_POST["id_i"]) && isset($_POST["titre"]) && isset($_POST["desc"]) && isset($_POST["nom_p"]) &&)
{
	echo $_POST["id_i"];
}
$req = "SELECT * FROM items";
$ask = mysqli_query($db, $req);
$i = 0;
while ($d = mysqli_fetch_assoc($ask))
{
	$items[$i]['id_i'] = $d['id_items'];
	$items[$i]['nom'] = $d['nom_items'];
	$items[$i]['desc'] = $d['desc_items'];
	$items[$i]['prix'] = $d['prix_items'];
	$req_p = "SELECT * FROM pics WHERE items_id = $d[id_items]";
	$ask_p = mysqli_query($db, $req_p);
	$j = 0;
	while ($d_p = mysqli_fetch_assoc($ask_p)) 
	{
		$items[$i]['nom_p'][$j] = $d_p['nom_pics'];
		$items[$i]['id_p'][$j] = $d_p['id_pics'];
		$j++;
	}
	$i++;
}
?>