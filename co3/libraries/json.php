<?php
/**
 * @version		$Id: json.php
 * @package		Co3
 * @copyright	Copyright (C) 2014 Christian Pschorr
 * @license		GNU/GPL
 */
class Co3Json {

	/**
	 * Erzeugt eine JSON Objekt
	 *
	 * @param array|object $mixed Array oder Objekt welches umgewandelt werden soll
	 * @return string JSON
	 */
	static public function encode($mixed) {
		return json_encode($mixed);
	}

	/**
	 * Erzeugt ein Objekt aus einem JSON String
	 *
	 * @param string $json
	 * @return object
	 */
	static public function decode($mixed) {
		return json_decode($mixed);
	}
}
?>