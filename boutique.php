<?php
	require_once('includes/header.php');
	require_once('includes/sidebar.php');
		$select=$db->prepare("SELECT * FROM articles");
		$select->execute();
		while ($S=$select->fetch(PDO::FETCH_OBJ)) {

?>
	<h1><?php echo $S->reference; ?></h1>
	<h3><?php echo $S->titre; ?></h3>
	<h3><?php echo $S->auteur; ?></h3>
	<h3><?php echo $S->description; ?></h3>
	<h3><?php echo $S->prix; ?>FCFA</h3>
	<h3><?php echo $S->photo; ?></h3>
	<br><br>

<?php
		}

	require_once('includes/footer.php');


?>