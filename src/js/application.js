var Tile 				= require('./Tile.js');
var TileDebug 	= require('./TileDebug.js');

var tileContainer = $('#tile-container');
$.each(Maps.data.tiles, function(i, tileData) {
	var tileInstance	= new Tile(tileData);
			tileContainer.append(tileInstance.render());
});