<?php
/**
 * @version		$Id: object.php
 * @package		Co3
 * @copyright	Copyright (C) 2014 Christian Pschorr
 * @license		GNU/GPL
 */
class Co3Object {

	/**
	 * Array mit nicht direkt aufrufbaren Klassenvariablen, die so nicht mehr
	 * ueber die __get Methode aufrufbar sind
	 *
	 * @var array private GET Klassenvariablen
	 * @access protected
	 * @since       1.2
	 */
	protected $_disabledGetProperties = array();

	/**
	 * Array mit nicht direkt aufrufbaren Klassenvariablen, die so nicht mehr
	 * ueber die __set Methode aufrufbar sind
	 *
	 * @var array private SET Klassenvariablen
	 * @access protected
	 * @since       1.2
	 */
	protected $_disabledSetProperties = array();

	/**
	 * liefert den Wert einer Klassenvariable. Es wird erst versucht eine Methode Namens
	 * '_get_property' zu finden. Falls vorhanden wird diese aufgerufen, ansonsten wird versucht
	 * die Klassenvariable mit dem Namen property zu finden.
	 *
	 * @access public
	 * @param string $property Name der get Methode bzw. der Klassenvariable
	 * @return Wert der Methode oder Variable
	 */
	public function __get($property) {
		$get_method_name = 'get' . ucfirst((string) $property);
		if(method_exists($this, $get_method_name) === true) {
			return $this->$get_method_name();
		}

		if(isset($this->$property) === true && in_array($property, $this->_disabledGetProperties) === false) {
			return $this->$property;
		}

		return null;
	}

	/**
	 * schreibt einen Wert in eine Klassenvariable. Es wird es versucht eine Methode mit dem Namen
	 * '_set_property' zu finden. Ist diese vorhanden, wird sie aufgerufen, anderenfalls wird versucht
	 * eine Klassenvariable mit dem Wert zu beschreiben.
	 * Es kann auch ein assozatives Array uebergeben werden, welches durchlaufen wird und jedes Element
	 * ebenfalls ueber die set Methode versucht wird in die Klassenvariable zu schreiben
	 *
	 * @access public
	 * @param string|array $property Name der get Methode bzw. der Klassenvariable / ein Array von Werten
	 *      welche den selben Weg ueber die set Methode nehmen sollen
	 * @param string $value Wert welcher in die Klassenvariable geschrieben werden soll
	 * @return none
	 */
	public function __set($property, $value = null) {
		if(is_array($property) === true) {
			foreach($property as $key => $value) {
				$this->set($key, $value);
			}
		}

		$set_method_name = 'set' . ucfirst((string) $property);
		if(method_exists($this, $set_method_name) === true) {
			$this->$set_method_name($value);
			return true;
		}

		if(in_array($property, $this->_disabledSetProperties) === false) {
			$this->$property = $value;
			return true;
		}
	}
}
?>