<?php
session_start();
require_once("./bin/connexion.php");
require_once("./bin/outils.php");
if(isset($_GET['p']) && $_GET['p'] != "admin")
{
	if(file_exists("./view/".$_GET['p']."/controller/".$_GET['p']."C.php"))
		require_once("./view/".$_GET['p']."/controller/".$_GET['p']."C.php");
}
else if (isset($_GET['p']) && $_GET['p'] == "admin" && isset($_GET['l']) && isset($_SESSION['admin']) && $_SESSION['admin'] === 1)
{

    if(file_exists("./view/".$_GET['p']."/view/".$_GET['l']."/controller/".$_GET['l']."C.php"))
        require_once("./view/".$_GET['p']."/view/".$_GET['l']."/controller/".$_GET['l']."C.php");
}
else if(isset($_GET['p']) && $_GET['p'] == 'admin' && !isset($_GET['l']))
{
        require_once("./view/".$_GET['p']."/view/connexion/controller/connexionC.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/menu.css">
         <link rel="stylesheet" type="text/css" href="css/boutique.css">
         <link rel="stylesheet" type="text/css" href="css/form.css">
           <link rel="stylesheet" type="text/css" href="css/admin.css">
        <title>Boutique en ligne</title>
    </head>

    <body>
<ul id="menu">
    <li><a href="index.php">Home</a></li>
    <li>
        <a href="#">Categories</a>
        <ul>
            <li><a href="#">CSS</a></li>
            <li><a href="#">Graphic design</a></li>
            <li><a href="#">Development tools</a></li>
            <li><a href="#">Web design</a></li>
        </ul>
    </li>
    <li><a href="#">Work</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
</ul>

<?php
    if(!isset($_SESSION['pseudo']))
    {      
?>
<span id="co">
	<form action="index.php?p=connexion" method="POST">
		<input type="text" name="pseudo" placeholder="Votre pseudo" />
		<input type="password" name="pass" placeholder="Votre mot de passe" />
		<input type="submit" class="myButton" name="" value="Se connecter">
	</form>
	<br />
	<a id= "insc" href="index.php?p=inscription">Pas encore inscrit</a>
</span>
<?php
    }
    else
    {
?>
    <span id="deco">
        Bonjour <?php echo $_SESSION['pseudo']; ?>  
        <a href="index.php?p=deco">
            <input type="submit" class="myButton" name="" value="Se deconnecter" style="margin-left:15px;">
        </a> 
        </span>
<?php
    }
?>
<div id="container">
<?php
if(isset($_GET['p']) && $_GET['p'] != "admin")
{
	if(file_exists("./view/".$_GET['p']."/".$_GET['p'].".php"))
		require_once("./view/".$_GET['p']."/".$_GET['p'].".php");
}
else if (isset($_GET['p']) && $_GET['p'] == "admin" && isset($_GET['l']) && isset($_SESSION['admin']) && $_SESSION['admin'] === 1)
{
    if(file_exists("./view/".$_GET['p']."/view/".$_GET['l']."/".$_GET['l'].".php"))
    {
        require_once("./view/".$_GET['p']."/menu.php");
        require_once("./view/".$_GET['p']."/view/".$_GET['l']."/".$_GET['l'].".php");
    }
    else
        require_once("./view/".$_GET['p']."/index.php");
}
else if(isset($_GET['p']) && $_GET['p'] == 'admin' && !isset($_GET['l']))
{
        require_once("./view/".$_GET['p']."/index.php");
}
?>
</div>
    </body>
</html>