<?php
if(isset($_SESSION['admin']) && $_SESSION['admin'] === 1)
{
	?>
	<div id="content">
		<div id="div-icone">
			<a href="index.php?p=admin&l=add">
				<span>
					<img src="./webroot/img/icone/add.png"/>
					<br />
					Ajouter un article
				</span>
			</a>
				<a href="index.php?p=admin?l=gestion">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Ajouter un article
			</span>
			</a>
				<a href="index.php?p=admin?l=gestion">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Ajouter un article
			</span>
			</a>
				<a href="index.php?p=admin?l=gestion">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Ajouter un article
			</span>
			</a>
		</div>
	<hr style="clear:both;display:block;"/>
	</div>
	<?php
}
else
{
?>
<form class="form-container" method="post" action="index.php?p=admin">
	<div class="form-title">
		<h2>Se connecter au backOffice</h2>
	</div>
	<div class="form-title">Nom</div>
		<input class="form-field" type="text" name="nom" placeholder="Entrez votre nom" /><br />
			<span class="erreur"> <?php if($exist == 1){?>* Pseudo deja existant  <?php } if ($pseudo == 1){ ?> *Vous devez renseigner un nom <?php } ?></span>
	<div class="form-title">Password</div>
		<input class="form-field" type="password" name="pass" placeholder="Entrez votre passe" /><br />
			<span class="erreur"> <?php if($exist == 3){?>* Mail deja existant<?php } if ($pass == 1){ ?> *Vous devez renseigner un mot de passe <?php }?></span>
	<div class="submit-container">
		<input class="submit-button" type="submit" value="Envoyer" />
	</div>
</form>
<?php
}
?>