<?php
if(isset($_POST['nom']) && isset($_POST['desc']))
{
	$post = postVerif($_POST);
	$req = "INSERT INTO cat (nom_cat, desc_cat) VALUES ('$post[nom]', '$post[desc]')";
	mysqli_query($db, $req);
}
?>