<?php
/**
 * Plugin Name:       wp-angular-custom-plugin
 * Plugin URI:        https://github.com/danielnaranjo/wp-angular-custom-plugin
 * Description:       Handle an custom Angular 8+ SPA page
 * Version:           0.1.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Daniel Naranjo
 * Author URI:        https://danielnaranjo.dev/
 * License:           MIT
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-angular-custom-plugin
**/

global $wp_version;

function add_this_script_as_angular_spa($atts = [], $content = null) {
    return '<div id="wp-angular-custom-plugin">Hello World</div>';
}
add_shortcode('wpspa', 'add_this_script_as_angular_spa');

function add_this_script_footer(){
?>
<script type="text/javascript">
console.log('wp-angular-custom-plugin is running')
</script>
<?php }
add_action('wp_footer', 'add_this_script_footer');


// Agregar archivos JS en la vista necesaria...
function add_this_scritps_to_wp_template() {
$plugin_url = plugin_dir_url( __FILE__ );
wp_enqueue_style( 'style-name', $plugin_url.'/styles.css' );
wp_enqueue_script( 'script-name', $plugin_url.'/scripts.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'add_this_scritps_to_wp_template');

// Crea logs en /wp-content/debug.log
//http://www.stumiller.me/sending-output-to-the-wordpress-debug-log/
if (!function_exists('write_log')) {
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}
