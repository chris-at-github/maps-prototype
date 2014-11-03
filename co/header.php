<?php

/*
|-----------------------------------------------------------------
| Konfiguration
|-----------------------------------------------------------------
| Array mit den Einstellungen, Menueeintraegen, usw. laden
|
*/
	include($_SERVER['DOCUMENT_ROOT'] . '/co/config.php');

/*
|-----------------------------------------------------------------
| TinyTools
|-----------------------------------------------------------------
| lade alle PHP-Anwendungen, Funktionen, Einstellungen, die
| waehrend des Seitenaufbaus benoetigt werden
|
*/
	include($_SERVER['DOCUMENT_ROOT'] . '/co/init.php');

/*
|-----------------------------------------------------------------
| Seitenelemente
|-----------------------------------------------------------------
| setzt die Seitenelemente, wie Seitentitel, Keywords, usw.
| zusammen. Sollten auf der Seite keine eigenen Elemente angegeben
| worden sein, werden die Daten aus der Konfigurationsdatei
| verwendet
|
*/
	if(isset($_CO_CONFIG_LOCAL) === false) {
		$_CO_CONFIG_LOCAL = array();
	}

	$_CO_CONFIG = tArray::arrayMergeRecursive($_CO_CONFIG_DEFAULT, $_CO_CONFIG_LOCAL);

/*
|-----------------------------------------------------------------
| Menue-Bibliothek
|-----------------------------------------------------------------
| laden der Menuebibliothek, die zur Anzeige der verschiedenen
| Menues, des Breadcrumbs, ... usw. benoetigt wird
|
*/
	$menu = tMenu::singleton()
		->reset()
		->setConfiguration($_CO_CONFIG)
		->setActive($_SERVER['PHP_SELF'])
		->setData(array_merge($_CO_MENU['mainmenu']));

	if(isset($_CO_HEADER) === false) {
		$_CO_HEADER = $menu->getActiveTitle();
	}

/*
|-----------------------------------------------------------------
| Elements
|-----------------------------------------------------------------
| laden von fertigen Seitenteilen wie z.B. Infoboxen in der linken
| Spalte, abhaenig von der aktuellen URL
|
*/
	if(isset($_CO_WIDGET_LOCAL) === false) {
		$_CO_WIDGET_LOCAL = array();
	}

	$_CO_WIDGET	= array_merge($_CO_WIDGET_DEFAULT, $_CO_WIDGET_LOCAL);

	// Widget Factory initialisieren
	$widget			= tWidget::singleton()
		->setConfiguration($_CO_CONFIG)
		->setData($_CO_WIDGET);
?>
<!doctype html>
<!--[if ie 7]> <html class="no-js ie ie7" lang="de" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if ie 8]> <html class="no-js ie ie8" lang="de" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if ie 9]> <html class="no-js ie ie9" lang="de" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<html class="no-js" lang="de" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $menu->renderBreadcrumbTitle(); ?>Maps</title>

	<!-- meta -->
	<meta charset="utf-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="must-revalidate" />

	<meta name="keywords" content="<?php echo $_CO_CONFIG['meta']['keywords']; ?>" />
	<meta name="description" content="<?php echo $_CO_CONFIG['meta']['description']; ?>" />
	<meta name="author" content="Christian Pschorr; http://christian-pschorr.de/" />
	<meta name="language" content="german, deutsch, de, ch, at" />

	<meta name="robots" content="all" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="3 days" />
	<!-- /meta -->

	<!-- favicon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">

	<!-- style -->
	<link rel="stylesheet" type="text/css" href="/css/screen.css" media="screen, projection, print" />
	<?php if(empty($_CO_CONFIG['css']) === false) { ?>
		<?php foreach($_CO_CONFIG['css'] as $css) { ?>
			<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" media="screen, projection, print" />
		<?php } ?>
	<?php } ?>
	<!-- /style -->

</head>
<body class="no-js">

	<!-- page -->
	<div id="page" <?php if($_CO_CONFIG['widescreen'] === true) { echo 'class="widescreen"'; } ?>>
		<header id="header" class="clearfix">
			<nav id="mainmenu" class="clearfix">
				<?php
					echo $menu
						->reset()
						->setData($_CO_MENU['mainmenu'])
						->setOptions(array(
							'maxDepth'	=> 1
						))
						->render();
				?>
			</nav>
		</header>

		<div id="body">