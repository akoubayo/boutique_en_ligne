<?php
$desc = "DESC";
$catcat = "";
if(isset($_GET['cat']) && !empty($_GET['cat']))
{
	$catcat = "&cat=$_GET[cat]";
}
if(isset($_GET['order']))
{
	if($_GET['order'] == 'DESC')
		$desc = 'ASC';
	else
		$desc = 'DESC';
}
?>
<div id="home">
<ul id="menu">
    <li><a href="#">TRIER par :</a></li>
    <li><a href="index.php?p=home&by=prix_items&order=<?php echo $desc.$catcat ?>">PRIX</a></li>
    <li><a href="index.php?p=home&by=nom_items&order=<?php echo $desc.$catcat ?>">NOM</a></li>
</ul>
<?php
if(isset($ask))
{
while($d = mysqli_fetch_assoc($ask))
{
	?>
	<div class="items">
	<form action="index.php?<?php echo $p ?>" method="post">
			<?php
				$req_p = "SELECT * FROM pics WHERE items_id = $d[id_items]";
				$ask_p = mysqli_query($db, $req_p);
				while ($d_p = mysqli_fetch_assoc($ask_p))
				{
					echo "<img id='items_img' src='./webroot/img/$d_p[nom_pics]' /> <br/>";
				}
			?>
			<span style="display:inline-block;height:110px"><?php echo substr($d['desc_items'],0, 100); ?>...</span>
			<br/>
			<span>Prix : <?php echo $d['prix_items']?> $</span>
			<br/>
			<input type="hidden" name="nom" value="<?php echo $d['nom_items']?>"/>
			<input type="hidden" name="prix" value="<?php echo $d['prix_items']?>"/>
			<input type="hidden" name="id_items" value="<?php echo $d['id_items']?>"/>
			<input type="hidden" name="desc_items" value="<?php echo $d['desc_items']?>"/>
			<input type="submit" class="myButton" name="" value="Ajouter au panier">
	</form>
	</div>
	<?php
}
}
?>
<div style="clear:both"></div>
</div>