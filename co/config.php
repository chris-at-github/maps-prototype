<?php

/*
|-------------------------------------------------------------------------------
| Konfiguration
|-------------------------------------------------------------------------------
*/
$_CO_CONFIG_DEFAULT = array(

	'meta' => array(
		'keywords'		=> 'Pingz, Wärmekissen, XXL, Dinkel, Kirschkern, klein, groß',
		'description'	=> 'Eine Auswahl von stylischen, selbstproduzierten Wärmekissen mit Dinkel- oder Kirschkernfüllung. Mit passenden Größen sowohl für die ganz Kleinen als auch XXL-Wärmekissen für die großen Genießer.'
	),

	'breadcrumb'	=> array(
		'root'	=>	array(
			'url'		=> '/',
			'title'	=> 'Startseite'
		),
		'seperator'	=> ' &#187; '
	),

	'section'	=> array(
		'header'			=> true,
		'footer'			=> true,
		'breadcrumb'	=> true,
		'bodyheader'	=> true
	),

	'css'	=> array(),

	'script'	=> array()
);

/*
|-------------------------------------------------------------------------------
| Menue
|-------------------------------------------------------------------------------
*/
$_CO_MENU['mainmenu'] = array(
	'/dinkelkissen/' => array(
		'title'			=> 'Dinkelkissen',
		'children'	=> array(
			'/dinkelkissen/smart-stars-stripes/' => array(
				'title'	=> 'Smart Stars & Stripes',
				'menu'	=> false
			),
			'/dinkelkissen/stretched-acid-dots/' => array(
				'title'	=> 'Stretched Acid Dots',
				'menu'	=> false
			),
			'/dinkelkissen/squared-ms-prison/' => array(
				'title'	=> 'Squared Ms. Prison',
				'menu'	=> false
			),
			'/dinkelkissen/smart-bluepoint/' => array(
				'title'	=> 'Smart Bluepoint',
				'menu'	=> false
			)
		)
	),
	'/ueber-uns/' => array(
		'title'			=> 'Über uns'
	),
	'/kontakt/' => array(
		'title'			=> 'Kontakt'
	)
);

/*
|-------------------------------------------------------------------------------
| Widgets
|-------------------------------------------------------------------------------
*/
$_CO_WIDGET_DEFAULT = array();

?>