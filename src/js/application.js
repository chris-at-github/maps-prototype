var Tile = require('./tile.js');

var tileContainer = $('#tile-container');
$.each(data.tiles, function(i, tileData) {
	var tileInstance	= new Tile(tileData);
			tileContainer.append(tileInstance.render());
});