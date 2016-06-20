<hr style="clear:both;display:block;margin-top:1000px;"/>
<form class="form-container2" method="post" action="index.php?p=admin&l=add" enctype="multipart/form-data">
			<div class="form-title2"><h2>Ajouter un article</h2></div>
			<div class="form-title2">
				Name of article
				<span class="erreur"><?php if(isset($_GET['o']) && $_GET['o'] == 1){?>* L'article existe déjà !  <?php } ?>
				</span>
			</div>
				<input class="form-field2" type="text" name="nom" /><br />
			<div class="form-title2">
				Prix of article
			</div>
				<input class="form-field2" type="text" name="prix" /><br />
			<div class="form-title2">Description de l'article</div>
				<textarea class="form-field3" type="text" name="desc" ></textarea><br />
			<div class="form-title2">Ajout une photo</div>
				  <input type="file" name="pics" /><br />
<?php
while($d = mysqli_fetch_assoc($ask_cat))
{
?>
			<div class="form-title2">Ajouter les categories</div>
       <input type="checkbox" name="cat<?php echo $d['id_cat']; ?>" value="<?php echo $d['id_cat']; ?>" /> <label for="frites"><?php echo $d['nom_cat'];?></label><br />
<?php
}
?>
			<div class="submit-container2">
				<input class="submit-button2" type="submit" value="Submit" />
			</div>
		</form>
</div>