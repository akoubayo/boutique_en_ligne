<hr style="clear:both;display:block;margin-top:1000px;"/>
<form class="form-container2" method="post" action="index.php?p=admin&l=add_use">
			<div class="form-title2"><h2>Ajouter un user</h2></div>
			<div class="form-title2">
				Name de l'utilisateur
				<span class="erreur"><?php if(isset($exist) && $exist == 1){?>* Se nom existe déjà !  <?php } ?>
				</span>
			</div>
			<input class="form-field2" type="text" name="nom" /><br />
			<div class="form-title2">
				Mail de l'utilisateur
				<span class="erreur"><?php if(isset($exist) && $exist == 2){?>* Se mail existe déjà !  <?php } ?>
				</span>
			</div>
				<input class="form-field2" type="text" name="mail" /><br />
			<div class="form-title2">
				Mot de passe de l'utilisateur
			</div>
				<input class="form-field2" type="password" name="pass" /><br />

			<div class="form-title2">
				Droit de passe de l'utilisateur => Admin: oui ou non.
			</div>
				Oui : <input  type="radio" value='1' name="admin" />
				| non : <input  type="radio" value='0' name="admin" checked="checked" /><br />

			<div class="submit-container2">
				<input class="submit-button2" type="submit" value="Submit" />
			</div>
		</form>
</div>