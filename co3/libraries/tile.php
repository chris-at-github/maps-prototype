<?php
/**
 * @version		$Id: tile.php
 * @package		Co3
 * @copyright	Copyright (C) 2012 Christian Pschorr
 * @license		GNU/GPL
 */
class Co3Tile extends Co3Object {

	/**
	 * X-Coordinate of the tile
	 *
	 * @var int
	 */
	public $x;

	/**
	 * Y-Coordinate of the tile
	 *
	 * @var int
	 */
	public $y;

	/**
	 * settings for the tile
	 *
	 * @var array
	 **/
	protected $settings = array();

	/**
	* Gets the X-Coordinate of the tile.
	*
	* @return int
	*/
	public function getX() {
		return $this->x;
	}

	/**
	* Sets the X-Coordinate of the tile.
	*
	* @param int $x the x
	* @return self
	*/
	public function setX($x) {
		$this->x = $x;
		return $this;
	}

	/**
	* Gets the Y-Coordinate of the tile.
	*
	* @return int
	*/
	public function getY() {
		return $this->y;
	}

	/**
	* Sets the Y-Coordinate of the tile.
	*
	* @param int $y the y
	* @return self
	*/
	public function setY($y) {
		$this->y = $y;
		return $this;
	}

	/**
	 * Returns the position of tile, that calculates form the X- and Y-coordinate
	 *
	 * @return object;
	 */
	public function getCoordinates() {

	}

	/**
	* Gets the value of settings.
	*
	* @return mixed
	*/
	public function getSettings() {
		return $this->settings;
	}

	/**
	* Sets the value of settings.
	*
	* @param mixed $settings the settings
	* @return self
	*/
	public function setSettings($settings) {
		$this->settings = $settings;
		return $this;
	}
}
?>