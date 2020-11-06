<?php
/**
 * Plugin Name: caught my eye Sortable User ID Column
 * Plugin URI: https://github.com/marklchaves/cme-user-id-column/
 * Description: Create a custom sortable user ID column on the Users page.
 * Author URI: https://www.caughtmyeye.cc/
 * Version: 1.1.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CME_USER_ID_COLUMN
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Credits
 * 
 * Based on code from Piippin's Plugins blog and
 * Stephen Harris tutorial on Envato Tuts.
 */

 /**
 * Display the internal unique user ID
 * on the wp-admin Users page.
 */

// Add the User ID Column
function caughtmyeye_add_user_id_column($columns) {
    $columns['user_id'] = 'User ID';
    return $columns;
}
add_filter('manage_users_columns', 'caughtmyeye_add_user_id_column');
 
// Display the User ID Column
function caughtmyeye_show_user_id_column_content($value, $column_name, $user_id) {
    if ( 'user_id' == $column_name )
        return $user_id;
    return $value;
}
add_action('manage_users_custom_column',  'caughtmyeye_show_user_id_column_content', 10, 3);

// Support Sorting
function caughtmyeye_sortable_user_id_column( $columns ) {
    $columns['user_id'] = 'User ID';
 
    // To make a column 'un-sortable' remove it from the array
    // e.g., unset($columns['date']);
 
    return $columns;
}
add_filter( 'manage_users_sortable_columns', 'caughtmyeye_sortable_user_id_column' );
