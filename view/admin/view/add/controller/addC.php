<?php
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.".".$ext);
}

if (isset($_POST['nom']) && isset($_POST['desc']) && isset($_FILES['pics']['name']))
{
	if(empty($_POST['nom']) && empty($_POST['desc']) && empty($_FILES['pics']['name']))
		header('Location:index.php?p=admin&l=add');
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
		$req = "INSERT INTO items (nom_items, desc_items) VALUES ('$post[nom]', '$post[desc]')";
		mysqli_query($db, $req);
		$req = "SELECT * FROM items WHERE nom_items = '$post[nom]'";
		$res = mysqli_query($db, $req);
		while ($don = mysqli_fetch_assoc($res)) 
		{
			$name = md5($_FILES['pics']['name']);
			$upload1 = upload('pics','./webroot/img/'.$name,1536000, array('png','gif','jpg','jpeg') );
			$ext = substr(strrchr($_FILES['pics']['name'],'.'),1);
			$req = "INSERT INTO pics (nom_pics,title, alt, items_id) VALUES ('$name.$ext', '', '', $don[id_items])";
			$ress = mysqli_query($db, $req);
		}
		header('Location:index.php?p=admin&l=add&o=ok');
	}
	else
		header('Location:index.php?p=admin&l=add&o=1');
}
?>