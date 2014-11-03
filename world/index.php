<?php include($_SERVER['DOCUMENT_ROOT'] . '/co3/header.php'); ?>

<?php
	// for($x = 1; $x <= 5; $x++) {
	// 	for($y = 1; $y <= 3; $y++) {
	// 		echo $x . 'x' . $y;
	// 	}
	// }

	$tile = new Co3Tile();
	$tile
		->setSettings($_CO3_CONFIG_WORLD)
		->setX(1)
		->setY(1);
?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/co3/footer.php'); ?>