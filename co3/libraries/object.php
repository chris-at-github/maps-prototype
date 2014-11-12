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
	 */
	protected $disabledGetProperties = array();

	/**
	 * Array mit nicht direkt aufrufbaren Klassenvariablen, die so nicht mehr
	 * ueber die __set Methode aufrufbar sind
	 *
	 * @var array private SET Klassenvariablen
	 * @access protected
	 */
	protected $disabledSetProperties = array();

	/**
	 * Array mit Namen, die nicht einer Eigenschaft entsprechen, aber eine Getter Methode
	 * besitzen und deswegen in der toJson oder toArray Methode verwendet werden sollen
	 *
	 * @var array private SET Klassenvariablen
	 * @access protected
	 */
	protected $appendProperties = array();

	/**
	 * Konstruktur
	 *
	 * @return void
	 */
	public function __construct() {
		$this->disabledGetProperties = array_merge($this->disabledGetProperties, array('disabledGetProperties', 'disabledSetProperties', 'appendProperties'));
	}

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
		$getMethodName = 'get' . ucfirst((string) $property);
		if(method_exists($this, $getMethodName) === true) {
			return $this->$getMethodName();
		}

		if(isset($this->$property) === true && in_array($property, $this->disabledGetProperties) === false) {
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

		$setMethodName = 'set' . ucfirst((string) $property);
		if(method_exists($this, $setMethodName) === true) {
			$this->$setMethodName($value);
			return $this;
		}

		if(in_array($property, $this->disabledSetProperties) === false) {
			$this->$property = $value;
			return $this;
		}
	}

	/**
	 * wandelt das Object in ein JSON Objekt um
	 *
	 * @return string JSON String
	 */
	public function toJson() {
		return Co3Json::encode($this->toArray());
	}

	/**
	 * wandelt das Object in ein Array um
	 *
	 * @return array
	 */
	public function toArray() {
		$return 			=	array();
		$properties 	= array_merge(call_user_func('get_object_vars', $this), array_flip($this->appendProperties));

		foreach($properties as $property => $value) {

			$getMethodName = 'get' . ucfirst((string) $property);
			if(method_exists($this, $getMethodName) === true) {
				$value = $this->$getMethodName();
			}

			if(in_array($property, $this->disabledGetProperties) === false) {
				$return[$property] = $value;
			}
		}

		return $return;
	}
}
?>