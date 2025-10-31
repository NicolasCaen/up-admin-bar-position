<?php
/**
 * Plugin Name: UP Admin Bar Position
 * Description: Déplace la barre d'administration WordPress en bas de l'écran pour les utilisateurs connectés.
 * Version: 1.1.0
 * Author: GEHIN NICOLAS
 * Text Domain: up-admin-bar-position
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

const UP_ADMIN_BAR_POSITION_VERSION = '1.1.0';

function up_admin_bar_position_enqueue_assets(): void {
    if (!is_admin_bar_showing()) {
        return;
    }

    wp_enqueue_style('admin-bar');
    wp_enqueue_style(
        'up-admin-bar-position',
        plugin_dir_url(__FILE__) . 'style.css',
        ['admin-bar'],
        null
    );

    wp_enqueue_script(
        'up-admin-bar-position',
        plugin_dir_url(__FILE__) . 'assets/js/admin-bar-position.js',
        [],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'up_admin_bar_position_enqueue_assets', 20);

function up_admin_bar_position_add_selector( $wp_admin_bar ): void {
    if ( ! is_admin_bar_showing() ) {
        return;
    }
    // Render a select inside an empty item so we can interact inside the toolbar
    $select_html = '<label style="display:flex;align-items:center;gap:6px">'
        . '<select id="upab-position-select" style="height:26px;line-height:26px;padding:2px 6px">'
        . '<option value="top">Haut</option>'
        . '<option value="bottom">Bas</option>'
        . '<option value="left">Gauche</option>'
        . '<option value="right">Droite</option>'
        . '</select>'
        . '</label>';

    $wp_admin_bar->add_node( [
        'id'    => 'upab-select',
        'title' => $select_html,
        'href'  => false,
        'meta'  => [ 'class' => 'ab-empty-item upab-select', 'html' => true, 'title' => __( 'Position de la barre', 'up-admin-bar-position' ) ],
        'parent'=> 'top-secondary',
    ] );
}
add_action( 'admin_bar_menu', 'up_admin_bar_position_add_selector', 90 );

