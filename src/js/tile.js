'use strict';

function Tile(options) {
	this.container 	= $('<div>');
	this.options		= $.extend({}, Tile.DEFAULTS, options);

	var instance 		= this;
	var initialize 	= function() {
		instance.container.addClass('tile');
	}

	initialize();
}

Tile.DEFAULTS = {
	x: 0,
	y: 0,
	position: {
		x: 0,
		y: 0
	}
}

Tile.prototype.render = function() {
	this.container.css({
		'top': 	this.options.position.y,
		'left': this.options.position.x
	});

	return this.container;
}

module.exports = Tile;