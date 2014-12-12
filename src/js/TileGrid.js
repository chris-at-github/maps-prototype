'use strict';

function TileGrid(options) {
	this.container 	= $('<div>');
	this.options		= $.extend({}, TileGrid.DEFAULTS, options);

	var instance 		= this;
	var initialize 	= function() {
		instance.container.addClass('tile');


		var position = instance.getPosition();
		console.log(position);
	}

	initialize();
}

TileGrid.DEFAULTS = {
	x: 0,
	y: 0,
	size: {
		width: 45,
		height: 45
	}
}

TileGrid.prototype.render = function() {
	return this.container;
}

TileGrid.prototype.getPosition = function() {
	var x = this.options.x * this.options.size.width;
	var y = this.options.y * this.options.size.height;

	return {
		'x': x,
		'y': y
	};
}

module.exports = TileGrid;