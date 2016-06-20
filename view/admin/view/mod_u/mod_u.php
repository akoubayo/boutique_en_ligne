<hr style="clear:both;display:block;margin-top:1000px;"/>
<table border=4  style="width:80%; text-align:center">
<th>Pseudo</th>
<th>Mail</th>
<th>Pass</th>
<th>Droit</th>
<th>Modifier</th>
<?php

while($d = mysqli_fetch_assoc($ask))
{
	?>
	<tr style="text-align:center">
	<form method="post" action="index.php?p=admin&l=mod_u">
	<input type="hidden" value="<?php echo $d['id_user'] ?>" name="id"/>
		<td><input type="test" name="pseudo" class="form-field1" value="<?php echo $d['pseudo'] ?>"/></td>
		<td><input type="test" name="mail" class="form-field1" value="<?php echo $d['mail'] ?>"/></td>
		<td><input type="password" name="pass" class="form-field1" placeholder="Entrez un nouveau mot de passe"/></td>
		<?php
			if($d['admin'] && $d['admin'] == 1)
			{
			?>
				<td>Oui: <input  type="radio" value=1 name="admin" checked="checked"/>
				| non : <input  type="radio" value=0 name="admin"  /></td>
		<?php
	}
			else{
		?>
			<td>Oui : <input  type="radio" value=1 name="admin" />
				| non : <input  type="radio" value=0 name="admin" checked="checked" /></td>
		<?php
	}
		?>
		<td><input type="submit" class="" value="Modifier"/></td>
	</form>
	</tr>
	<?php
}
?>
</table>
</div>