<?php
/**
 * Plugin Name: UP Admin Bar Position
 * Description: Déplace la barre d'administration WordPress en bas de l'écran pour les utilisateurs connectés.
 * Version: 1.0.0
 * Author: GEHIN NICOLAS
 * Text Domain: up-admin-bar-position
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

const UP_ADMIN_BAR_POSITION_VERSION = '1.0.0';

function up_admin_bar_position_enqueue_assets(): void {
    if (!is_admin_bar_showing()) {
        return;
    }

    wp_enqueue_style('admin-bar');

    wp_enqueue_script(
        'up-admin-bar-position',
        plugin_dir_url(__FILE__) . 'assets/js/admin-bar-position.js',
        [],
        UP_ADMIN_BAR_POSITION_VERSION,
        true
    );

    $css = '
        .admin-bar .wc-block-components-drawer__content{
            margin-top: 0 !important;
        }
        #wpadminbar {
            top: auto !important;
            bottom: 0;
            position: fixed !important;
            width: 100%;
        }

        /* Ajuster la position du corps de la page */
        html {
            margin-top: 0 !important;
            margin-bottom: 32px !important;
        }

        /* Faire apparaître les sous-menus au-dessus */
        #wpadminbar .ab-sub-wrapper {
            bottom: 32px !important;
            top: auto !important;
        }

        /* Ajuster les sous-menus pour qu\'ils s\'affichent correctement */
        #wpadminbar .menupop .ab-sub-wrapper,
        #wpadminbar .shortlink-input {
            top: auto !important;
            bottom: 100% !important;
        }

        /* Flèches des sous-menus */
        #wpadminbar .menupop .ab-sub-wrapper .ab-submenu {
            padding: 6px 0 0 0;
        }

        #wpadminbar .quicklinks .menupop ul.ab-sub-secondary {
            bottom: 0;
            top: auto;
        }

        #wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper {
            right: auto;
            left: 0;
        }

        /* Correction pour les écrans mobiles */
        @media screen and (max-width: 782px) {
            html {
                margin-bottom: 46px !important;
            }
            #wpadminbar .ab-sub-wrapper {
                bottom: 46px !important;
            }
        }
    ';

    wp_add_inline_style('admin-bar', $css);
}

add_action('wp_enqueue_scripts', 'up_admin_bar_position_enqueue_assets', 20);

