<?php
/*
definiendo valores por defecto
*/

define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'layout_simple.php');
define('MODULO_PATH', realpath('./modulos/'));
define('LAYOUT_PATH', realpath('./layouts/'));

$conf['home'] = array(
		'archivo' => 'home.php',
		'layout' => LAYOUT_DEFECTO ); //indicamos que se vea el loyout por defecto...el mas simple
?>