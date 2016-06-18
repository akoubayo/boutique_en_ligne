<hr style="clear:both;display:block;margin-top:1000px;"/>
<?php
foreach ($items as $key => $value) {
	?>
	<div class="aff-items">
	Modifier les articles :
<form action="index.php?p=admin&l=modifier" method="post" class="form-container2">
	<?php
	foreach ($value as $k => $v) {	
?>
<span>
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
			<div class="form-title2">Nom de l'article</div>
			<input type='text' class="form-field2" value=" <?php echo $v; ?> " name="titre"/>
		<?php
	} 
	?>
	<br/>
</span>
<span>
	<?php if($k == 'desc')
	{
		?>
			<div class="form-title2">Description de l'article</div>
			<textarea name="desc" class="form-field3"> <?php echo $v; ?> </textarea>
		<?php
	} 
	?>
	<br/>
</span>
	<?php 
		if($k == 'nom_p') 
		{ 
			echo "<input type='hidden' value=". $items[$key]['id_p'][0] ." name='id_p'/>";
			echo "<img src='./webroot/img/".$items[$key][$k][0]."'/>' <br /><br />"; 
			echo "<div class='form-title2'>Modifier la photo</div>";
			echo ' <input type="file" name="pics" /><br /><br/>';
		}

	?>

<?php
	}
?>
<input class="submit-button2" type="submit" value="Submit" />
</form>
</div>
<hr />
<?php
}
?>
</div>