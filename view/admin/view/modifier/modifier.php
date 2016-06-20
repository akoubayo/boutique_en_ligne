<hr style="clear:both;display:block;margin-top:1000px;"/>
<?php
$tt = 0;
if(isset($items))
{
foreach ($items as $key => $value) {
	?>
	<div class="aff-items">
	Modifier les articles :
<form action="index.php?p=admin&l=modifier" method="post" class="form-container2" enctype="multipart/form-data">
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
</span>
<span>
	<?php if($k == 'desc')
	{
		?>
			<div class="form-title2">Description de l'article</div>
			<textarea name="desc" class="form-field3" style='height:100px;'> <?php echo $v; ?> </textarea>
		<?php
	} 
	?>

</span>
<span>
	<?php if($k == 'prix')
	{
		?>
			<div class="form-title2">Prix de l'article</div>
			<input type='text' class="form-field2" value=" <?php echo $v; ?> " name="prix"/>
		<?php
	} 
	?>
</span>
<span>
	<?php if($k == 'cat')
	{
		$tt = 1;
		?>
			<div class="form-title2">Categorie de l'article</div>
			<?php
			foreach ($catcat as $kk => $vv) {
				$check = "";
				foreach ($v as $kkk => $vvv) {
					if($kk == $vvv)
						$check = 'checked="checked"';				
				}
				?>
				  <input type="checkbox" name="cat<?php echo $kk ?>" <?php echo $check ?> value="<?php echo $kk ?>" /> 
				  <?php
			
					  ?>
				  <label for="frites"><?php echo  $vv ?></label>
				<?php
	
			}
			?>
		
		<?php

		echo "<br/>	<br/>";
	} 
	?>

</span>
	<?php 
		if($k == 'nom_p') 
		{ 
			echo "<br/><br/>";
			echo "<input type='hidden' value=". $items[$key]['id_p'][0] ." name='id_p'/>";
			echo "<img src='./webroot/img/".$items[$key][$k][0]."' style='width:100px;'/>' <br /><br />"; 
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
}
?>
</div>