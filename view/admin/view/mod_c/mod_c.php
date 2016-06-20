<hr style="clear:both;display:block;margin-top:1000px;"/>
<table border=4  style="width:80%; text-align:center">
<th>nom</th>

<?php
while($d = mysqli_fetch_assoc($ask))
{
	?>
	<tr style="text-align:center">
	<form method="post" action="index.php?p=admin&l=mod_c">
	<input type="hidden" value="<?php echo $d['id_cat'] ?>" name="id"/>
		<td><input type="test" name="nom" class="form-field1" value="<?php echo $d['nom_cat'] ?>"/></td>
		<td><input type="submit" class="" value="Modifier"/></td>
	</form>
	</tr>
	<?php
}
?>
</table>
</div>