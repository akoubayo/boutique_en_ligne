<hr style="clear:both;display:block;margin-top:1000px;"/>
<table border=4 >
	<th>Nom de l'utilisateur</th>
	<th>Mail de l'utilisateur</th>
	<th>Droit de l'utilisateur</th>
	<th>sup de l'article</th>
	<?php  
		if(isset($items))
		{
			foreach ($items as $key => $value) 
			{
				?>
				<form method="post" action="index.php?p=admin&l=del_u">
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
			 <?php echo $v; ?>
		</td>
		<?php
	} 
	?>
	<?php if($k == 'mail')
	{
		?>
		<td>
			<?php echo $v; ?>
		</td>
		<?php
	} 
	?>

	<?php if($k == 'admin')
	{
		?>
		<td>
			<?php echo $v; ?> </textarea>
		</td>
		<?php
	} 
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
</div>