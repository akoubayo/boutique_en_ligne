<?php
$pseudo = 0;
$pass = 0;
$mail = 0;
$exist = 0;
if(isset($_POST['nom']) && isset($_POST['pass']) && isset($_POST['mail']))
{
	if(empty($_POST['nom']))
		$pseudo = 1;
	if(empty($_POST['pass']))
		$pass = 1;
	if (empty($_POST['mail']))
		$mail = 1;
	else
	{
		$exist = 0;
		$post = postVerif($_POST);
		$post['pass'] = password($post['pass']);
		$req = "SELECT * FROM user WHERE pseudo ='$post[nom]' OR mail = '$post[mail]'";
		$res = mysqli_query($db, $req);
		while($don = mysqli_fetch_assoc($res))
		{
			if ($post['nom'] == $don['pseudo'])
				$exist = 1;
			else if($post['mail'] == $don['mail'])
				$exist = 2;
		}
		if ($exist === 0)
		{
			$req = "INSERT INTO user (pseudo, pass, mail) VALUES ('$post[nom]', '$post[pass]', '$post[mail]')"; 
			mysqli_query($db, $req);
			$_SESSION['pseudo'] = $post['nom'];
			$_SESSION['mail'] = $post['mail'];
			header('Location:index.php');
		}
	}
}
?>
