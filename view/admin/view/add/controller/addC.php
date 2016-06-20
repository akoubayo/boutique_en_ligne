<?php
if (isset($_POST['nom']) && isset($_POST['desc']) && isset($_FILES['pics']))
{
	if(empty($_POST['nom']) || empty($_POST['desc']) || empty($_FILES['pics']['name']))
		header('Location:index.php?p=admin&l=add');
	else
	{
		$test = 0;
		foreach ($_POST as $key => $value) {
			if('cat' == substr($key, 0, 3))
				$test = 1;
		}
		if($test === 0)
		{
				header('Location:index.php?p=admin&l=addd');
						echo "efew";

		}
	$post = postVerif($_POST);
	$req = "SELECT * FROM items WHERE nom_items = '$post[nom]'";
	$res = mysqli_query($db, $req);
	$exist = 0;
	while($don = mysqli_fetch_assoc($res))
	{
		if($don['nom_items'] == $post['nom'])
		{
			$exist = 1;
		}
	}
	if ($exist === 0)
	{
		$req = "INSERT INTO items (nom_items, desc_items, prix_items) VALUES ('$post[nom]', '$post[desc]', $post[prix])";
		mysqli_query($db, $req);
		$req = "SELECT * FROM items WHERE nom_items = '$post[nom]'";
		$res = mysqli_query($db, $req);
		while ($don = mysqli_fetch_assoc($res)) 
		{
			$name = md5($_FILES['pics']['name']);
			$upload1 = upload('pics','./webroot/img/'.$name,1536000000, array('png','gif','jpg','jpeg') );
			$ext = substr(strrchr($_FILES['pics']['name'],'.'),1);
			$req = "INSERT INTO pics (nom_pics,title, alt, items_id) VALUES ('$name.$ext', '', '', $don[id_items])";
			$ress = mysqli_query($db, $req);
			foreach ($post as $k => $v) {
			if(substr($k,0, -1) == 'cat')
			{
				$req = "INSERT INTO cat_items (cat_id, items_id) VALUES ($v, $don[id_items])";
				mysqli_query($db, $req);
			}
		}
		}
		header('Location:index.php?p=admin&l=add&o=ok');
	}
	else
		header('Location:index.php?p=admin&l=add&o=1');
}
}
$req = "SELECT * FROM cat";
$ask_cat = mysqli_query($db, $req);
?>