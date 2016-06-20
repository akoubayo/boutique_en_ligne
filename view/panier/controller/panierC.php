		<?php
if(isset($_GET['sup']))
{
	foreach ($_SESSION['panier'] as $key => $value) {
			if($key == $_GET['sup'])
			{
				unset($_SESSION['panier'][$key]);
			}
	}
}
?>