var Tile = require('./tile.js');

var tileContainer = $('#tile-container');
var tileInstance	= new Tile(data.tile);

tileContainer.append(tileInstance.render());