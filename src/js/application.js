var Tile 			= require('./Tile.js');
var TileGrid 	= require('./TileGrid.js');

var tileContainer = $('#tile-container');
$.each(Maps.data.tiles, function(i, tileData) {
	var tileInstance	= new Tile(tileData);
			tileContainer.append(tileInstance.render());
});


// var tileGridContainer = $('#tile-grid-container');
// var tileGridInstance = new TileGrid({x: 0, y: 1});
// 		tileGridContainer.append(tileGridInstance.render());