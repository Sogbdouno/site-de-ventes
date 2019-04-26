<?php
	require_once('includes/header.php');
	$select=$db->prepare("SELECT*FROM articles");
	$select->execute();
	while ($s $select ->fetc(PDO::FETCH_OBJ)) {

?>
		<h2><?php echo $s->reference;?></h2><br/>
		<h3><?php echo $s->titre;?></h2><br/>
		<h4><?php echo $s->auteur;?></h2><br/>
		<h5><?php echo $s->description;?></h2><br/>
		<h6><?php echo $s->prix;?></h2>FCFA<br/>
		<br/><br/>
<?php

	}
	require_once('includes/footer.php');

?>