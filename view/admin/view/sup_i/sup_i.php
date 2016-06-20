<hr style="clear:both;display:block;margin-top:1000px;"/>
<table border=4 >
	<th>photo de l'article</th>
	<th>nom de l'article</th>
	<th>description de l'article</th>
	<th>prix</th>
	<th>sup de l'article</th>
	<?php  
		if(isset($items))
		{
			foreach ($items as $key => $value) 
			{
				?>
				<form method="post" action="index.php?p=admin&l=sup_i">
				<?php
				echo "<tr>";
				foreach ($value as $k => $v) 
				{
?>


<?php if($k == 'id_i')
	{
		?>
			<input type='hidden' value=" <?php echo $v; ?> " name="id_i"/>
		<?php
	} 
	?>
	<?php if($k == 'nom')
	{
		?>
		<td>
			<div class="form-title2">Nom de l'article</div>
			<input type='text' class="form-field2" value=" <?php echo $v; ?> " name="titre"/>
		</td>
		<?php
	} 
	?>
	<?php if($k == 'prix')
	{
		?>
		<td>
			<div class="form-title2">Prix de l'article</div>
			<input type='text' class="form-field2" value=" <?php echo $v; ?> " name="prix"/>
			</td>
		<?php
	} 
	?>

	<?php if($k == 'desc')
	{
		?>
		<td>
			<div class="form-title2">Description de l'article</div>
			<textarea name="desc" class="form-field3"> <?php echo $v; ?> </textarea>
		</td>
		<?php
	} 

	if($k == 'nom_p') 
		{ 
			echo "<td>";
			echo "<input type='hidden' value=". $items[$key]['id_p'][0] ." name='id_p'/>";
			echo "<img src='./webroot/img/".$items[$key][$k][0]."'/>' <br /><br />"; 
			echo "<div class='form-title2'>Modifier la photo</div>";
			echo ' <input type="file" name="pics" /><br /><br/>';
			echo "</td>";
		}
			?>
<?php
				}
				?>
				
	<td>
<input type="submit" value="supprimer"/>
	</td>
	</tr>
	</form>
				<?php
			}
		}
	?>
	
</table>
<div/>