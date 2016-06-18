<?php
if($db = mysqli_connect('localhost', 'root','root'))
{
	$sql = "show databases";
	$ret = mysqli_query($db, $sql);
	$don = mysqli_fetch_assoc($ret);
	$base = 0;
	foreach ($ret as $k => $v)
	{
		foreach ($v as $key => $value) {
			if ($value === 'boutique')
			{
				$base = 1;
			}
		}
	}
	if($base === 0)
	{
		require_once('install.php');
	}
	else
	{
		$db = mysqli_connect('localhost', 'root','root','boutique');
	}
}
else // Mais si elle rate…
{
	echo 'Erreur'; // On affiche un message d'erreur.
}
?>