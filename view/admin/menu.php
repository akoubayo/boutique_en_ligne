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
			<a href="index.php?p=admin&l=add_cat">
				<span>
					<img src="./webroot/img/icone/add.png"/>
					<br />
					Ajouter une categorie
				</span>
			</a>
				<a href="index.php?p=admin&l=modifier">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Modifer un article
			</span>
			</a>
				<a href="index.php?p=admin&l=sup_i">
			<span>
				<img src="./webroot/img/icone/del.png"/>
				<br />
				Supprimer un article
			</span>
			</a>
			<a href="index.php?p=admin&l=mod_c">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Modifer une categorie
			</span>
			</a>
				<a href="index.php?p=admin&l=del_c">
			<span>
				<img src="./webroot/img/icone/del.png"/>
				<br />
				Supprimer une categorie
			</span>
			</a>
				<a href="index.php?p=admin&l=add_use">
			<span>
				<img src="./webroot/img/icone/use.png"/>
				<br />
				Ajouter un utilisateur
			</span>
				</a>
				<a href="index.php?p=admin&l=mod_u">
			<span>
				<img src="./webroot/img/icone/add.png"/>
				<br />
				Modifer un utilisateur
			</span>
			</a>
				<a href="index.php?p=admin&l=del_u">
			<span>
				<img src="./webroot/img/icone/del.png"/>
				<br />
				Supprimer un utilisateur
			</span>
			</a>
			<a href="index.php?p=admin&l=commande">
				<span>
					<img src="./webroot/img/icone/add.png"/>
					<br />
					Voir les commandes.
				</span>
			</a>
		</div>
	<?php
}
	?>
