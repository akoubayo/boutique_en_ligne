<?php
if(isset($_POST['nom']) && isset($_POST['pass']))
{
	if(empty($_POST['nom']))
		$pseudo = 1;
	if (empty($_POST['pass']))
		$pass = 1;
	if(!empty($_POST['pass']) && !empty($_POST['nom']))
	{
		$post = postverif($_POST);
		$password = password($post['pass']);
		$req = "SELECT * FROM user WHERE pseudo = '$post[nom]' AND pass = '$password' AND admin = 1";
		$ask = mysqli_query($db, $req);
		while ($donnee = mysqli_fetch_assoc($ask)) 
		{
			if($post['nom'] == $donnee['pseudo'] && $password == $donnee['pass'] && $donnee['admin'] === "1")
			{
				$_SESSION['pseudo'] = $donnee['pseudo'];
				$_SESSION['mail'] = $_SESSION['mail'];
				$_SESSION['admin'] = 1;
			}
		}
		if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1)
			header("Location: index.php?p=admin");
		if(!isset($_SESSION['pseudo']))
		{
			header("Location: index.php?error=no");
		}
		else
			$exist = 0;
	}	
	}
?>