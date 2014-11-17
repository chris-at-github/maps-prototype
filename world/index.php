<?php include($_SERVER['DOCUMENT_ROOT'] . '/co3/header.php'); ?>

<?php
	$collection = new Co3Collection();

	for($x = 0; $x <= 1; $x++) {
		for($y = 0; $y <= 1; $y++) {
			$tile = new Co3Tile();
			$tile
				->setSettings($_CO3_CONFIG_WORLD)
				->setX($x)
				->setY($y);

			$collection->add($tile);
		}
	}
?>

<script type="text/javascript">
	var data = {
		tiles: <?php echo $collection->toJson() ?>
	};
</script>

<div id="map-container">
	<div id="tile-container"></div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/co3/footer.php'); ?>