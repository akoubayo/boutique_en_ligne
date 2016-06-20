<?php
if(isset($_POST['pseudo']) && isset($_POST['pass']))
{
	$post = postverif($_POST);
	$pass = password($post['pass']);
	$req = "SELECT * FROM user WHERE pseudo = '$post[pseudo]' AND pass = '$pass'";
	$ask = mysqli_query($db, $req);
	while ($donnee = mysqli_fetch_assoc($ask)) 
	{
		if ($post['pseudo'] === $donnee['pseudo'] AND $pass === $donnee['pass'])
		{
			$_SESSION['pseudo'] = $donnee['pseudo'];
			$_SESSION['mail'] = $donnee['mail'];
			$_SESSION['admin'] = intval($donnee['admin']);
			header('Location:index.php');
		}
	}
}
if(!isset($_SESSION['pseudo']))
{
			header("Location: index.php?error=no");	
}
?>