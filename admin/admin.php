<?php
$serveur='localhost';
$login='root';
$pass='root';

try {
	$db=new PDO("msqli:host=$serveur;dbname=site-de-vente-de-livres",$login,$pass);
	$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$insert=$db->prepare("INSERT INTO articles VALUES('$reference','$titre','$auteur','$description')");
				$insert->execute();
				
	
	
} catch (Exception $e) {
	echo"une eurreur est survenu";

	
}
session_start();
if (isset($_SESSION['username'])) {
	if (isset($_GET['action'])) {
		
	
	if ($_GET['action']=='add') {
		if (isset($_POST['submit'])) {
			$reference=$_POST['reference'];
			$titre=$_POST['titre'];
			$auteur=$_POST['auteur'];
			$description=$_POST['description'];
			$prix=$_POST['prix'];
			if ($reference&&$titre&&$auteur&&$description&&$prix) {
				$insert=$db->prepare("INSERT INTO articles VALUES('$reference','$titre','$auteur','$description')");
				$insert->execute();
				
			
			}else{
				echo "veuillez remplir tous les champs";
			}
		}
?>
<form action="" method="post">
	<h3>Reference de l'article:</h3><input type="text" name="reference">
	<h3>Titre de l'article:</h3><input type="text" name="titre">
	<h3>Auteur de l'article:</h3><input type="text" name="auteur">
	<h3>Description de l'article:</h3><input type="text" name="description">
	<h3>prix de l'article:</h3><input type="text" name="prix"><br/>
	<input type="submit" name="submit">
	
	
</form>
<?php		
		
	}elseif ($_GET['action']=='modify') {
		
	}elseif ($_GET['action']=='delete') {
		
	}else{
		die('il y a une erreur');
	}
}else{

}	
}else{
	header('Location:../index.php');
}

?>
<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" rel="stylesheet"/>
<h1>Bienvenue,<?php echo $_SESSION['username'];?></h1>
<a href="?action=add">Ajouter un article</a>
<a href="?action=modify">Modifier un article</a>
<a href="?action=delete">Supprimer un article un article</a>
