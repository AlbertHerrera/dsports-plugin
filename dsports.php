<?php
/**
 * Plugin Name: Dsports
 * Plugin URI: https://github.com/AlbertHerrera/dsport_plugin
 * Description: Este plugin crea concursos online.
 * Version: 0.0.1
 * Author: Albert Herrera
 * Author URI: wwww.shuffleshowcase.com
 *
 * Text Domain: dsports
 */
defined( 'ABSPATH' ) or die( '¡Sin trampas!' );


add_filter( 'the_title', 'dsports_cambiar_titulo', 10, 2 );
function dsports_cambiar_titulo( $title, $id ) {
  $title = 'This is working fine? ' . $title;
  return $title;
}