<?php
$i = 0;
while($d = mysqli_fetch_assoc($ask))
{
	$co[$i]['nom'] = $d['pseudo'];
	$co[$i]['co'] = explode(";",$d['commande']);
	$i++;
}
?>

<hr style="clear:both;display:block;margin-top:1000px;"/>
<?php
$i = 0;
if(isset($co))
{
	while ($i < count($co)) {
	
	
?>
<span style="font-weight:bolder;margin-left:20px;">  =========      COMMANDE de <?php echo $co[$i]['nom']; ?>   ==============</span>
<table border=4 >
	<th>Nom de l'art</th>
	<th>QTE d'art</th>
	<th>Total</th>
	<?php
	if($co[$i]['co'])
	{
		foreach ($co[$i]['co'] as $key => $value) {
							echo '<tr>';
			$art = explode(":", $value);
			foreach ($art as $key => $value) {
				$td = explode("=", $value);
				$j = 0;
				foreach ($td as $key => $value) {
					if($j % 2 !== 0)
						echo "<td>$value</td>";
					$j++;
				}

			}
							echo '</tr>';
		}
	}
	?>
</table>
<br/><br/>
<?php
	$i++;
}
}
?>

</div>