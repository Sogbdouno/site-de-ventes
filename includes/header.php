<?php
	session_start();
	$serveur='localhost';
	$login='root';
	$pass='root';


	try {
		$db=new PDO("mysql:host=$serveur;dbname=site-de-vente-de-livres",$login,$pass);
		$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

				
	
	
	} catch (Exception $e) {
		echo"une erreur est survenu";

	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" rel="stylesheet"/>
</head>
<body>
<header>
	<br><h1>Présence Africaine</h1><br>
	<ul class="menu">
		<li><a href="index.php">Accueil</a></li>
		<li><a href="catalogue.php">Catalogue</a></li>
		<li><a href="panier.php">Panier</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<li><a href="admin/index.php">connextion</a></li>
		<li><a href="connexion.php">Conditions generales de vente</a></li>
	</ul>
</header>
</body>
</html>