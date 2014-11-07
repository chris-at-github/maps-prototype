'use strict';

function Tile(options) {
	this.container 	= $('<div>');

	var instance 		= this;
	var initialize 	= function() {
		instance.container.addClass('tile');
	}

	initialize();
}

Tile.prototype.render = function() {
	return this.container;
}

module.exports = Tile;