<?php
if(isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && !empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['pass']))
{
	$post = postVerif($_POST);
	$pass = password($post['pass']);
	$req = "UPDATE user SET pseudo = '$post[pseudo]',  pass = '$pass', mail = '$post[mail]', admin = $post[admin] WHERE id_user = $post[id]";
	mysqli_query($db, $req);
		header("location:index.php?p=admin&l=mod_u");
}

$req = "SELECT * FROM user";
$ask = mysqli_query($db, $req);

?>