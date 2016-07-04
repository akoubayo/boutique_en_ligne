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
    $sql = "CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
    $ret = mysqli_query($db, $sql);
    $db = mysqli_connect('localhost', 'root','root','boutique');
    mysqli_set_charset($db, "utf8");
    //  CATEGORIES

    $sql = "CREATE TABLE `cat` (
      `id_cat` int(11) NOT NULL,
      `nom_cat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `desc_cat` text COLLATE utf8_unicode_ci NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
    $ret = mysqli_query($db, $sql);

    $sql = "INSERT INTO `cat` (`id_cat`, `nom_cat`, `desc_cat`) VALUES
    (15, 'Drones', ''),
    (17, 'Hélicoptères', ''),
    (18, 'Promotions', '');";
    $ret = mysqli_query($db, $sql);

    // CAT ITEMS
    $sql = "CREATE TABLE `cat_items` (
      `id_cat_items` int(11) NOT NULL,
      `cat_id` int(11) NOT NULL,
      `items_id` int(11) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
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
    (72, 14, 10),
    (73, 15, 25),
    (74, 15, 26),
    (75, 18, 26),
    (78, 15, 27),
    (79, 17, 28);";
    $ret = mysqli_query($db, $sql);


    //Commande 
    $sql = "CREATE TABLE `commande` (
      `id_commande` int(11) NOT NULL,
      `commande` text NOT NULL,
      `timestamp` int(11) NOT NULL,
      `pseudo` varchar(255) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;";
    $ret = mysqli_query($db, $sql);




    //  ITEMS
    $sql = "CREATE TABLE `items` (
      `id_items` int(11) NOT NULL,
      `nom_items` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `desc_items` text COLLATE utf8_unicode_ci NOT NULL,
      `prix_items` float NOT NULL DEFAULT '0'
    ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
    $ret = mysqli_query($db, $sql);

    $sql = "INSERT INTO `items` (`id_items`, `nom_items`, `desc_items`, `prix_items`) VALUES
(26, 'Quadricoptère RC Caméra WL V959', 'Quadricoptère de la marque WL TOYS, plus grand que son petit frère le V939, ce nouveau drone de 30 centimètres embarque cette fois une camera afin que vous puissiez filmer vos vols ou même de capturer des photos. La coque est composée de nombreux LEDs lumineux qui assure un éclairage permanent, idéal si vous souhaitez voler la nuit, vous ne pouvez pas le manquer, 4 moteurs indépendants entraînent les grandes hélices qui tournent à haute vitesse afin d''assurer une stabilité instantanée du quadricoptère, ce qui est certainement son gros point fort.', 33.99),
(27, 'Eachine Racer 250 FPV Drone Built in 5.8G Transmitter OSD With HD Camera ARF Version', 'Eachine Racer 250 FPV Drone Built in 5.8G Transmitter OSD With HD Camera ARF Version.', 89.9),
(28, 'Mini Hélicoptère Télécommandé RC F103 AVATAR', 'Ce nano hélicoptère est un birotor comprenant 4 canaux de transmissions, deux rotors supplémentaires viennent se greffer, un de chaque côté du cockpit, ce qui permet à ce modèle de pouvoir se déplacer latéralement de droite à gauche et inversement sans recourir à un plateau cyclique inclinable. C''est une autre méthode qui permet d''augmenter la solidité de l''hélicoptère tout en conservant un maximum de contrôles.', 20.9);";

    $ret = mysqli_query($db, $sql);


    //  PICS
    $sql = "CREATE TABLE `pics` (
      `id_pics` int(11) NOT NULL,
      `nom_pics` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `items_id` int(11) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;";
    $ret = mysqli_query($db, $sql);


    $sql = "INSERT INTO `pics` (`id_pics`, `nom_pics`, `title`, `alt`, `items_id`) VALUES
    (26, 'e82402b8b855534ba3c1bce876f57be0.jpg', '', '', 26),
    (27, '9766a66813a7d6647cd433694d2d1fd8.jpg', '', '', 27),
    (28, 'f6386c4a33df75f14c83c480673b3b84.jpg', '', '', 28);";
    $ret = mysqli_query($db, $sql);


    //  USERS
    $sql = "CREATE TABLE `user` (
      `id_user` int(11) NOT NULL,
      `pseudo` varchar(50) CHARACTER SET latin1 NOT NULL,
      `pass` varchar(255) CHARACTER SET latin1 NOT NULL,
      `mail` varchar(255) CHARACTER SET latin1 NOT NULL,
      `admin` int(11) DEFAULT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
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
      ADD PRIMARY KEY (`id_user`);";
    $ret = mysqli_query($db, $sql);

    $sql = "ALTER TABLE `commande`
      ADD PRIMARY KEY `id_commande` (`id_commande`);";
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

    $sql = "ALTER TABLE `commande`
      MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;";
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



