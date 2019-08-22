<?php
global $event_db_version;
$event_db_version = '1.0';
function hatazu_event_install() {
	global $wpdb;
	$tb_account = $wpdb->prefix . "customer";
	$tb_event = $wpdb->prefix . "event";
	$tb_join_event = $wpdb->prefix . "join_event";
	$tb_target_event = $wpdb->prefix . "target_event";
	$tb_consultant = $wpdb->prefix . "customer_consultant";
	$tb_service = $wpdb->prefix . "service";
	if($wpdb->get_var("SHOW TABLES LIKE '$tb_consultant'") != $tb_consultant) {
	    $sql = "CREATE TABLE IF NOT EXISTS `$tb_consultant` (
	                `id` mediumint(9) NOT NULL AUTO_INCREMENT,
	                `idcustomer` varchar(220) DEFAULT '' NULL,
	                `message` varchar(255) DEFAULT '' NULL,
	    	        `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
	                PRIMARY KEY (`id`) 
	            ) $charset_collate;";
	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    // Create the table
	    dbDelta($sql);

	}
	
	if($wpdb->get_var("SHOW TABLES LIKE '$tb_account'") != $tb_account) {
	    $sql = "CREATE TABLE IF NOT EXISTS `$tb_account` (
	                `id` mediumint(9) NOT NULL AUTO_INCREMENT,
	                `firstname` varchar(50) DEFAULT '' NULL,
	                `lastname` varchar(50) DEFAULT '' NULL,
	                `email` varchar(55) DEFAULT '' NOT NULL,
	                `num_phone` varchar(15) DEFAULT '' NOT NULL,
	                `address` varchar(100) DEFAULT '' NOT NULL,
	                `time_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
	                PRIMARY KEY (`id`) 
	            ) $charset_collate;";
	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    // Create the table
	    dbDelta($sql);
	}
	if($wpdb->get_var("SHOW TABLES LIKE '$tb_event'") != $tb_event) {
	    $sql = "CREATE TABLE IF NOT EXISTS `$tb_event` (
	                id mediumint(9) NOT NULL AUTO_INCREMENT,
					name_event varchar(55) DEFAULT '' NOT NULL,
					time_start datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					time_finish datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	                PRIMARY KEY (`id`)
	               
	            ) $charset_collate;";
	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    // Create the table
	    dbDelta($sql);
	}

	if($wpdb->get_var("SHOW TABLES LIKE '$tb_join_event'") != $tb_join_event) {
		$sql = "CREATE TABLE `$tb_join_event`  (
			  `id_join` mediumint(9) NOT NULL AUTO_INCREMENT,
			  `id_customer` mediumint(9) NOT NULL,
			  `date_join` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  `id_event` mediumint(9) NOT NULL,
			  `idservice` int(10) NULL DEFAULT NULL,
			  `number_lotto` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
			  `gift` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
			  PRIMARY KEY (`id_join`) 
			) $charset_collate;";
	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    // Create the table
	    dbDelta($sql);
	}

	if($wpdb->get_var("SHOW TABLES LIKE '$tb_service'") != $tb_service) {
		$sql = "CREATE TABLE `$tb_service`  (
		  `idservice` int(11) NOT NULL AUTO_INCREMENT,
		  `nameservice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
		  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
		  PRIMARY KEY (`idservice`) 
		) $charset_collate;";
	    
	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    // Create the table
	    dbDelta($sql);
	}
	if($wpdb->get_var("SHOW TABLES LIKE '$tb_service'") == $tb_service) {
		$sql = "INSERT INTO `wp_service` VALUES (1, 'Điều Tri CNC', NULL);
			INSERT INTO `wp_service` VALUES (2, 'Điều Trị Da', NULL);
			INSERT INTO `wp_service` VALUES (3, 'Phun Xăm', NULL);
			INSERT INTO `wp_service` VALUES (4, 'Thẩm Mỹ Nội Khoa', NULL);
			INSERT INTO `wp_service` VALUES (5, 'Dịch Vụ Trọn Gói', NULL);
			INSERT INTO `wp_service` VALUES (6, 'Dịch vụ Hi-Ulther', NULL);
			INSERT INTO `wp_service` VALUES (7, 'Điều Trị Mụn', NULL);
			INSERT INTO `wp_service` VALUES (8, 'Điều Trị Nám', NULL);
			INSERT INTO `wp_service` VALUES (9, 'Chưa phát sinh dv', NULL);";	    
		    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		    // Create the table
		    dbDelta($sql);
	}
	
	add_option( 'event_db_version', $event_db_version );
}
?>