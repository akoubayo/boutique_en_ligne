<?php
?>
<form class="form-container" method="post" action="index.php?p=inscription">
	<div class="form-title">
		<h2>S'inscrire</h2>
	</div>
	<div class="form-title">Nom</div>
		<input class="form-field" type="text" name="nom" placeholder="Entrez votre nom" /><br />
			<span class="erreur"> <?php if($exist == 1){?>* Pseudo deja existant  <?php } if ($pseudo == 1){ ?> *Vous devez renseigner un nom <?php } ?></span>
	<div class="form-title">Email</div>
		<input class="form-field" type="text" name="mail" placeholder="Entrez votre email" /><br />
		<span class="erreur"><?php if($exist == 2){?> * Mail deja existant<?php } if ($mail == 1){ ?> *Vous devez renseigner un mail <?php } ?></span>
	<div class="form-title">Password</div>
		<input class="form-field" type="password" name="pass" placeholder="Entrez votre passe" /><br />
			<span class="erreur"> <?php if($exist == 3){?>* Mail deja existant<?php } if ($pass == 1){ ?> *Vous devez renseigner un mot de passe <?php }?></span>
	<div class="submit-container">
		<input class="submit-button" type="submit" value="Envoyer" />
	</div>
</form>