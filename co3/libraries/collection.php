<?php
/**
 * @version		$Id: collection.php
 * @package		Co3
 * @copyright	Copyright (C) 2014 Christian Pschorr
 * @license		GNU/GPL
 */
class Co3Collection implements Iterator {

	private $key = 0;
	private $storage = array();

	public function __construct() {
		$this->key = 0;
	}

	public function rewind() {
		$this->key = 0;
	}

	public function current() {
		return $this->storage[$this->key];
	}

	public function key() {
		return $this->key;
	}

	public function next() {
		++$this->key;
	}

	public function valid() {
		return isset($this->storage[$this->key]);
	}

	public function add($object) {
		$this->storage[] = $object;
	}

	/**
	 * wandelt das Object in ein JSON Objekt um
	 *
	 * @return string JSON String
	 */
	public function toJson() {
		$json = array();

		foreach($this->storage as $key => $object) {
			$json[] = $object->toArray();
		}

		return Co3Json::encode($json);
	}
}
?>