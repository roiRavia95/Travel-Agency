<?php
function travelAgency_database()
{
    global $wpdb;

    global $travelAgency_db_version;
    $travelAgency_db_version = '1.0';

    $table = $wpdb->prefix . 'contacts';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table(
    id mediumint (9) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    email varchar(50) DEFAULT '' NOT NULL,
    message longtext NOT NULL,
    PRIMARY KEY (id)
) $charset_collate;";


    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_action('after_setup_theme', 'travelAgency_database');