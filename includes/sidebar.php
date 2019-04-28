<div class="sidebar">
	<h4>Derniers articles</h4>

<?php

		$select=$db->prepare("SELECT * FROM articles ORDER BY reference DESC LIMIT 0,1");
		$select->execute();

		while ($S=$select->fetch(PDO::FETCH_OBJ)) {

?>
	<div style="text-align: center;">
	<h1 style="color:white;"><?php echo $S->reference; ?></h1>
	<h3 style="color:white;"><?php echo $S->titre; ?></h3>
	<h3 style="color:white;"><?php echo $S->auteur; ?></h3>
	<h3 style="color:white;"><?php echo $S->description; ?></h3>
	<h3 style="color:white;"><?php echo $S->prix; ?>FCFA</h3>
	</div>
	
	<br><br>

	<?php

}

?>

</div>