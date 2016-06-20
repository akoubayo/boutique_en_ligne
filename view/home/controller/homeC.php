<?php
$order = "";
$cat = "";
$table = "";
if(isset($_GET['order']) && isset($_GET['by']))
{
	$get = postVerif($_GET);
	$order = " ORDER BY ";

	if ($get['by'] == 'prix_items' || $get['by'] == 'nom_items' || $get['by'] == 'desc_items')
	{
		$order .=" $get[by] ";
		if($get['order'] == "DESC" || $get['order'] == "ASC")
			$order .= " $get[order] ";
		else
			$order = "";
	}
	else
		$order = "";

}
if(isset($_GET['cat']) && !empty($_GET['cat']))
{
	$idcat = intval($_GET['cat']);
	$cat = "WHERE id_cat = cat_id AND id_items = items_id AND id_cat = $idcat ";
	$table = ", cat_items, cat";
}
$req = "SELECT * FROM items $table $cat $order";
$ask = mysqli_query($db, $req);
$p = "";
foreach ($_GET as $key => $value) {
	$p .= $key."=".$value."&";
}
$p = substr($p, 0,-1);
if(!isset($_SESSION['panier']))
{
	$_SESSION['panier'] = array();
}
if(isset($_POST['nom']))
{
	if(!isset($_SESSION['panier'][$_POST['nom']]))
	{
		$_SESSION['panier'][$_POST['nom']]['prix'] = $_POST['prix'];
		$_SESSION['panier'][$_POST['nom']]['nb_items'] = 1;
	}
	else
	{	
		$nb = 5;
		$_SESSION['panier'][$_POST['nom']]['nb_items'] += 1;
	}
}
/*print_r($_SESSION['panier']);
foreach ($_SESSION['panier'] as $key => $value) {
	echo $key." === ".$value."<br/>";
}
*/

?>