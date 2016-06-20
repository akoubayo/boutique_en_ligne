<div style="width:80%;margin-left:auto;margin-right:auto;background-color:white; text-align:center;padding:50px; font-weight:bolder;font-size:20px;">
<?php
			if(isset($_SESSION['pseudo']))
			{
				echo 'Votre commande est en cours de preparation';
			}
			else
			{
				echo "Vous devez être connecté pour valider votre panier";
			}
?>
</div>