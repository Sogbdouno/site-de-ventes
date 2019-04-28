<?php
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

session_start();

?>

	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" rel="stylesheet"/>
	<h1>Bienvenue,<?php echo $_SESSION['username'];?></h1>
	<a href="?action=add">Ajouter un article</a>
	<a href="?action=modifyanddelete">Modifier/supprimer un article un article</a><br/>

<?php

	if (isset($_SESSION['username'])) {

		if (isset($_GET['action'])) {
		
	
		if ($_GET['action']=='add') {

		if (isset($_POST['submit'])) {
			$reference=$_POST['reference'];
			$titre=$_POST['titre'];
			$auteur=$_POST['auteur'];
			$description=$_POST['description'];
			$rubriqueID=$_POST['rubriqueID'];
			$prix=$_POST['prix'];
			$photo=$_POST['photo'];
		if ($reference&&$titre&&$auteur&&$description&&$prix) {
		    $insert=$db->prepare("INSERT INTO articles VALUES('$reference','$titre','$auteur','$description','$rubriqueID','$prix','$photo')");
			$insert->execute();
				
			
			}else{
				echo "remplissez tous les champs";
			}
		}
?>

	<form action="" method="post">

		<h3>Reference de l'article:</h3><input type="text" name="reference">
		<h3>Titre de l'article:</h3><input type="text" name="titre">
		<h3>Auteur de l'article:</h3><input type="text" name="auteur">
		<h3>Description de l'article:</h3> <textarea name="description"></textarea>
		<h3>Rubrique de l'article:</h3><input type="text" name="rubriqueID"> 
		<h3>prix de l'article:</h3><input type="text" name="prix">
		<h3>photo de l'article:</h3><input type="text" name="photo"><br/>
		<br/>
		<input type="submit" name="submit">
	
	</form>

<?php	

	}elseif($_GET['action']=='modifyanddelete') {	

		$select=$db->prepare("SELECT * FROM articles");
		$select->execute();

		while ($S=$select->fetch(PDO::FETCH_OBJ)) {
			 echo $S->reference;

?>
			

			<a href="?action=modify&amp;reference=<?php echo $S->reference;?>">Modifier</a>
			<a href="?action=delete&amp;reference=<?php echo $S->reference;?>">Supprimer</a><br><br>


<?php
		}
		
	}elseif ($_GET['action']=='modify') {

		$reference=$_GET['reference'];

		$select=$db->prepare("SELECT * FROM articles");
		$select->execute();

		$data=$select->fetch(PDO::FETCH_OBJ);

?>


	<form action="" method="post">
		<h3>Reference de l'article:</h3><input value="<?php echo $data->reference;?>" type="text" name="reference">
		<h3>Titre de l'article:</h3><input value="<?php echo $data->titre;?>"type="text" name="titre">
		<h3>Auteur de l'article:</h3><input value="<?php echo $data->auteur;?>"type="text" name="auteur">
		<h3>Description de l'article:</h3> <textarea name="description"><?php echo $data->description;?></textarea> 
		<h3>Rubrique de l'article:</h3><input value="<?php echo $data->rubriqueID;?>" type="text" name="rubriqueID"><br/>

		<h3>prix de l'article:</h3><input value="<?php echo $data->prix;?>" type="text" name="prix">
		<h3>Photo de l'article:</h3><input value="<?php echo $data->photo;?>" type="text" name="photo"><br>
		<input type="submit" name="submit" value="Modifier">
	
	
	</form>

<?php

		if (isset($_POST['submit'])) {
			$reference=$_POST['reference'];
			$titre=$_POST['titre'];
			$auteur=$_POST['auteur'];
			$description=$_POST['description'];
			$rubriqueID=$_POST['rubriqueID'];
			$prix=$_POST['prix'];
			$photo=$_POST['photo'];

			$update=$db->prepare("UPDATE articles SET titre='$titre',auteur='$auteur',description='$description',rubriqueID='$rubriqueID',prix='$prix',photo='$photo' WHERE reference='$reference'");
			$update->execute();
			header('Location:admin.php?action=modifyanddelete');

		}
			
	}elseif ($_GET['action']=='delete') {
		$reference=$_GET['reference'];
		$select=$db->prepare("DELETE FROM articles WHERE reference=$reference");
		$select->execute();
		
	}else{
		die('il y a une erreur');
	}
}else{ 

}	
}else{
	header('Location:../index.php');
}

?>


