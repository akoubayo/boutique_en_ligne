<table style="background-color:white; padding:20px; width:80%;margin-left:auto;margin-right:auto">
<th>Nom de l'article</th>
<th>Prix de l'article</th>
<th>Quantite d'article</th>
<th>Supprimer l'article</th>
<th>Total</th>
<tr>
				<td colspan=5><hr/></td>
</tr>
<?php
if (isset($_SESSION['panier']))
{
	$total = 0;
	foreach($_SESSION['panier'] as $k => $v)
	{
			?>
			<tr style="text-align:center">
				<td><?php echo $k; ?></td>
				<td><?php echo $_SESSION['panier'][$k]['prix']; ?></td>
				<td><?php echo $_SESSION['panier'][$k]['nb_items']; ?></td>
				<td><a href="index.php?p=panier&sup=<?php echo $k?>"><img src="./webroot/img/icone/del.png" style="width:30px"/></a></td>
				<td><?php echo  $_SESSION['panier'][$k]['prix'] * $_SESSION['panier'][$k]['nb_items']." $"; ?></td>
			</tr>
			<tr>
				<td colspan=5><hr/></td>
			</tr>
			<?php
			$total += $_SESSION['panier'][$k]['prix'] * $_SESSION['panier'][$k]['nb_items'];
	}
	?>
	<tr>
		<td  colspan=4>
			TOTAL :
		</td>
		<td style="text-align:center">
			<?php echo $total." $" ?>
		</td>
	</tr>
	<?php
}
?>
<tr>
	<td colspan=5 style="text-align:center">
		<?php
			if(isset($_SESSION['pseudo']))
			{
				echo '<a href="index.php?p=valide"><input type="submit" class="myButton" name="" value="Valider le panier"></a>';
			}
			else
			{
				echo "Vous devez être connecté pour valider votre panier";
			}
		?>
	</td>
</tr>
</table>
<?php
?>