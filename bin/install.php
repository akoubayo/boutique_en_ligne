<?php
$db = mysqli_connect('localhost', 'root','root');
$sql = "show databases";
  $ret = mysqli_query($db, $sql);
  $base = 0;
  foreach ($ret as $k => $v)
  {
    foreach ($v as $key => $value){
      //$req = "DROP DATABASE IF EXISTS $value";
      //mysqli_query($db, $req);
      if ($value === 'boutique')
      {

        $base = 1;
      }
    }
  }
    if($base === 0)
  {
    $sql = "CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;";
    $ret = mysqli_query($db, $sql);
    $db = mysqli_connect('localhost', 'root','root','boutique');
    //  CATEGORIES

$sql = "CREATE TABLE `cat` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(255) NOT NULL,
  `desc_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
$ret = mysqli_query($db, $sql);

$sql = "INSERT INTO `cat` (`id_cat`, `nom_cat`, `desc_cat`) VALUES
(7, 'Accessoires lingerie', ''),
(8, 'Culotte et string', ''),
(9, 'Sexy', ''),
(10, 'Ensemble lingerie', ''),
(11, 'Nouveau', ''),
(12, 'Bustier', ''),
(13, 'Soutient-gorge', ''),
(14, 'Nuisette et deshabillé', '');";
$ret = mysqli_query($db, $sql);

// CAT ITEMS
$sql = "CREATE TABLE `cat_items` (
  `id_cat_items` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$ret = mysqli_query($db, $sql);

$sql = "INSERT INTO `cat_items` (`id_cat_items`, `cat_id`, `items_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(7, 7, 4),
(9, 8, 6),
(10, 9, 6),
(16, 7, 3),
(17, 9, 3),
(18, 7, 9),
(19, 7, 5),
(20, 9, 5),
(58, 9, 13),
(59, 12, 13),
(60, 9, 14),
(62, 7, 15),
(63, 13, 15),
(64, 7, 18),
(65, 9, 18),
(66, 9, 19),
(67, 9, 20),
(68, 8, 21),
(69, 7, 10),
(70, 10, 10),
(71, 11, 10),
(72, 14, 10);";
$ret = mysqli_query($db, $sql);


//Commande 
$sql = "CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `commande` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$ret = mysqli_query($db, $sql);




//  ITEMS
$sql = "CREATE TABLE `items` (
  `id_items` int(11) NOT NULL,
  `nom_items` varchar(255) NOT NULL,
  `desc_items` text NOT NULL,
  `prix_items` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
$ret = mysqli_query($db, $sql);

$sql = "INSERT INTO `items` (`id_items`, `nom_items`, `desc_items`, `prix_items`) VALUES
(3, 'Bordel', 'Bordel\r\nJarretiere Signature noir', 100.9),
(4, 'MAISON CLOSE', 'MAISON CLOSE\r\nHarnais Jardin  Maison Close en dentelle Leavers.', 34.9),
(5, 'Maison Close. Bretelle', 'Maison Close.', 18.9),
(6, 'LISE CHARMEL', 'LISE CHARMEL\r\nSlip seduction Emaux Graphic Lise Charmel en tulle doux, orne de delicate broderie florale.', 16.5),
(10, 'AUBADE Spicy Night Ensemble noir', 'Ensemble Spicy Night Aubade. Nuisette en soie fluide, tres elegante.', 189.9),
(13, 'TRIUMPH Charm Spotlight Bustier noir', 'TRIUMPH Charm Spotlight Bustier noir\r\nBustier Charm Spotlight Triumph en matiere souple aux motifs floraux pour un look ultra feminin et elegant. Bretelles reglables. Fermeture dos par agrafes.', 37.9),
(14, 'LISE CHARMEL Pretty Nymphea Top Aube Nymphea', 'Top Pretty Nymphea Lise Charmel en voile ultra-leger aux imprimes frais et eclatants, pour un look estival et feminin.', 56.9),
(15, 'ANDRES SARDA Lya Soutien-gorge', 'Soutien-gorge rembourre Lya Andres Sarda en resille fine aux motifs zebres.', 98.9),
(16, 'BORDELLE Adriana Soutien-gorge armatures', 'BORDELLE Adriana Soutien-gorge armatures\r\nSoutien-gorge a armatures ouvert Adriana Bordelle en tulle doux et ultra-fin et bande reglables.', 168.9),
(17, 'ANDRES SARDA Milano Soutien-gorge armatures', 'ANDRES SARDA Milano Soutien-gorge armatures.\r\nSoutien-gorge armatures Milano Andres Sarda en tulle plumetis et delicate dentelle.', 99.9),
(18, 'LES JUPONS DE TESS Astrid Serre-taille porte-jarretelles', 'Serre-taille porte-jarretelles Astrid Les Jupons de Tess en delicate dentelle Leavers de Calais.', 78.9),
(19, 'LISE CHARMEL Love Magicienne Deshabille en soie Soie Nacre', 'LISE CHARMEL Love Magicienne Deshabillee en soie Soie Nacre', 205),
(20, 'LISE CHARMEL Love Fantasme Babydoll', 'LISE CHARMEL Love Fantasme Babydoll', 153),
(21, 'ANTIGEL Clan Antigel Shorty Tartan', 'ANTIGEL Clan Antigel Shorty Tartan\r\nShorty Clan Antigel Antigel en maille douce a  imprime tartan. Joli galon dentelle en tour de taille, pour un look feminin. Fond doublee 100% coton.', 26.8);";

$ret = mysqli_query($db, $sql);


//  PICS
$sql = "CREATE TABLE `pics` (
  `id_pics` int(11) NOT NULL,
  `nom_pics` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
$ret = mysqli_query($db, $sql);


$sql = "INSERT INTO `pics` (`id_pics`, `nom_pics`, `title`, `alt`, `items_id`) VALUES
(3, '8c4a0d14ead96714f665a0d8ee16e504.jpg', '', '', 3),
(4, '5d13f6e7524f467f53e627f20128d1aa.jpg', '', '', 4),
(5, '6ef13092d9e2de0c87f91a02e18beb5b.jpg', '', '', 5),
(6, '8be6d73b7417df0b4ca371206f658cda.jpg', '', '', 6),
(10, '9a6b5196f1d37cd0337207b45bee414b.jpg', '', '', 10),
(13, 'aae44a7a62e43814dc1a1b844eaa28a2.jpg', '', '', 13),
(14, '99c80be88cd36e46a3635aa11a3a5293.jpg', '', '', 14),
(15, 'a8b328d3015e9cf48a0018b1ac63b9bb.jpg', '', '', 15),
(16, '3d48207dc2d1aad66d9944bd8484699d.jpg', '', '', 16),
(17, '3edc8d7832a51872eedbdc4d4d20db08.jpg', '', '', 17),
(18, '88af69f7780f6ae24d91cc53cfc95254.jpg', '', '', 18),
(19, 'd67fd6836c41038a9e615fc1ec2c5a87.jpg', '', '', 19),
(20, 'abbf377f6912f9eab90d34b439925fd6.jpg', '', '', 20),
(21, 'd216a18aeb581fa61100258aaa8533d9.jpg', '', '', 21);";
$ret = mysqli_query($db, $sql);


//  USERS
$sql = "CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$ret = mysqli_query($db, $sql);



$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `cat`
  ADD PRIMARY KEY (`id_cat`);";
$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `cat_items`
  ADD PRIMARY KEY (`id_cat_items`);";
$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `items`
  ADD PRIMARY KEY (`id_items`);";
$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `pics`
  ADD PRIMARY KEY (`id_pics`);";
$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
";
$ret = mysqli_query($db, $sql);
$sql = "ALTER TABLE `cat`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
$ret = mysqli_query($db, $sql);

$sql = "ALTER TABLE `cat_items`
  MODIFY `id_cat_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
$ret = mysqli_query($db, $sql);

$sql = "ALTER TABLE `items`
  MODIFY `id_items` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";
$ret = mysqli_query($db, $sql);

$sql = "ALTER TABLE `pics`
  MODIFY `id_pics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";
$ret = mysqli_query($db, $sql);

$sql = "ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;";
$ret = mysqli_query($db, $sql);
  }

$db = mysqli_connect('localhost', 'root','root','boutique');

if(isset($_POST['nom']) && isset($_POST['pass']))
{
	$exist = 0;
	require_once('./outils.php');
	$post = postVerif($_POST);
	$pass = password($post['pass']);
	$req = "SELECT * FROM user WHERE pseudo ='$post[nom]' OR mail = '$post[mail]'";
		$res = mysqli_query($db, $req);
		while($don = mysqli_fetch_assoc($res))
		{
			if ($post['nom'] == $don['pseudo'])
				$exist = 1;
			else if($post['mail'] == $don['mail'])
				$exist = 2;
		}
		if ($exist === 0)
		{
			$req = "INSERT INTO user (pseudo, pass, mail, admin) VALUES ('$post[nom]', '$pass', '$post[mail]', 1)";
			$res = mysqli_query($db, $req);
			header('Location:../index.php');
		}
}


?>
<div style="background-color:grey; width:25%; margin-left:auto;margin-right:auto;padding:20px;text-align:center">
	<div>
		Veuillez entrer le premier super user<br/><br/>
		<form action="./install.php" method="post">
			<input type="text" name="nom" placeholder="Entrez le pseudo"><br/><br/>
			<input type="text" name="mail" placeholder="Entrez le mail"><br/><br/>
			<input type="password" name="pass" placeholder="Entrez le password"><br/><br/>
			<input type="submit">
		</form>
	</div>
</div>



