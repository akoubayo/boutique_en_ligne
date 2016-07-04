<?php
$aa = 0;
if(isset($_POST["id_i"]) && isset($_POST["titre"]) && isset($_POST["desc"]) && isset($_POST["id_p"]))
{
	$post = postVerif($_POST);
	$prix = $post['prix'];
	$req = "UPDATE items SET nom_items = '$post[titre]' , desc_items = '$post[desc]', prix_items = $prix WHERE id_items = '$post[id_i]'";
	mysqli_query($db, $req);
	if(isset($_FILES['pics']) && !empty($_FILES['pics']['name']))
	{
		$name = md5($_FILES['pics']['name']);
		$upload = upload('pics','./webroot/img/'.$name,1536000, array('png','gif','jpg','jpeg') );
		$ext = substr(strrchr($_FILES['pics']['name'],'.'),1);
		$req = "UPDATE pics SET nom_pics = '$name.$ext' WHERE id_pics = $post[id_p]";
		$ress = mysqli_query($db, $req);
	}
	foreach ($post as $key => $value) {
		if('cat' == substr($key, 0, 3))
		{
			$aa = 1;
		}
	}
	if($aa === 1)
	{
	$req = "DELETE FROM cat_items WHERE items_id = $post[id_p]";
		mysqli_query($db, $req);
	}
	foreach ($post as $key => $value) {
		if('cat' == substr($key, 0, 3))
		{
			$req = "INSERT INTO cat_items (cat_id , items_id) VALUES ($value, $post[id_i])";
			mysqli_query($db, $req);
		}
	}
	header("Location:index.php?p=admin&l=modifier");
}
$req = "SELECT * FROM items ORDER BY id_items DESC";
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
	$req_c = "SELECT * FROM cat_items, cat, items WHERE cat_id = id_cat AND id_items = items_id AND id_items = $d[id_items]";
	$ask_c = mysqli_query($db, $req_c);
	$j = 0;
	while($d_c = mysqli_fetch_assoc($ask_c))
	{
		$items[$i]['cat'][$j] = $d_c['cat_id'];
		$j++;
	}
	$i++;
}
$req = "SELECT * FROM cat";
$ask_cat = mysqli_query($db, $req);
while ($d = mysqli_fetch_assoc($ask_cat)) {
	$catcat[$d['id_cat']] = $d['nom_cat'];
}
?>