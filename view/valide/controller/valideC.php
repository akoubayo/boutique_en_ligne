<?php
$commande = "";
foreach ($_SESSION['panier'] as $key => $value) {
	$commande .= "nom=$key:prix=$value[prix]:nb=$value[nb_items];";
unset($_SESSION['panier'][$key]);
}
if(!empty($commande))
{
$req = "INSERT INTO commande(commande, `timestamp`, pseudo) VALUES ('$commande', 12323, '$_SESSION[pseudo]')";
mysqli_query($db, $req);
}	
?>