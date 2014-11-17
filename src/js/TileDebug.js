'use strict';

function TileDebug(options) {
	this.container 	= $('<div>');
	this.options		= $.extend({}, options);

	var instance 		= this;
	var initialize 	= function() {
		alert(1);
	}

	initialize();
}

TileDebug.prototype.render = function() {
	return this.container;
}

module.exports = TileDebug;