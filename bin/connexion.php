<?php
if($db = mysqli_connect('localhost', 'root','root'))
{
	$sql = "show databases";
	$ret = mysqli_query($db, $sql);
	$don = mysqli_fetch_assoc($ret);
	$base = 0;
	foreach ($ret as $k => $v)
	{
		foreach ($v as $key => $value){
			//$req = "DROP DATABASE IF EXISTS $value";
			//mysqli_query($db, $req);
			if ($value === 'boutique')
			{

				$base = 1;
			}
		}
	}
	if($base === 0)
	{
		header('Location:./bin/install.php');
					echo "ww";
	}
	else
	{
		$db = mysqli_connect('localhost', 'root','root','boutique');
		mysqli_set_charset($db, "utf8");
	}
}
else // Mais si elle rate…
{
	echo 'Erreur'; // On affiche un message d'erreur.
}
?>