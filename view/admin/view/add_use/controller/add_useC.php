<?php
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
			$req = "INSERT INTO user (pseudo, pass, mail, admin) VALUES ('$post[nom]', '$post[pass]', '$post[mail]', $post[admin])"; 
			mysqli_query($db, $req);
			header('Location:index.php?p=admin&l=add_use&status=ok');
		}
	}
}
?>