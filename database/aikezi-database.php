<?php

class AikeziSolutionsDatabase {
    public function __construct() {
        $pluginfile = AIKEZI_S_PLUGIN_DIR . '/aikezi-solutions.php';
        //(updating)
        //register_activation_hook($pluginfile, array ($this, 'aikezi_solutions_createdb'));
        
        register_activation_hook($pluginfile, array ($this, 'aikezi_solutions_active'));
        register_deactivation_hook($pluginfile, array ($this, 'aikezi_solutions_deactive'));
    }
    //create table on options database when active
    public function aikezi_solutions_active() {
        add_option('aikezi_solutions_version', '2.3', '', 'yes');
        global $wpdb;
        $table_name = $wpdb->prefix . "options";
        $wpdb->update(
                        $table_name,
                        array('autoload'=>'yes'),
                        array('option_name'=>'aikezi_solutions_version'),
                        array('%s'),
                        array('%s')
                    );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'yes'),
                    array('option_name'=>'aikezi_solutions_contact'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'yes'),
                    array('option_name'=>'aikezi_s_label'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'yes'),
                    array('option_name'=>'aikezi_s_content'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'yes'),
                    array('option_name'=>'aikezi_s_id'),
                    array('%s'),
                    array('%s')
                );
    }
    //create new table (updating)
    /*public function aikezi_solutions_createdb() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'aikezi_solutions_option';
        if($wpdb->get_var(" SHOW TABLE LIKE '" . $table_name . "'") != $table_name){
            $sql = "CREATE TABLE `" . $table_name . "` (
        	        `myid` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
        	        `label` varchar(50) DEFAULT NULL,
        	        `value` varchar(250) DEFAULT NULL,
        	        `shortcode` tinyint(4) DEFAULT NULL,
        	        PRIMARY KEY (`myid`)
        	        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
	        require_once ABSPATH . '/wp-admin/includes/upgrade.php';
            dbDelta($sql);
            }
    }*/
    public function aikezi_solutions_deactive(){
        global $wpdb;
        $table_name = $wpdb->prefix . "options";
        $wpdb->update(
                        $table_name,
                        array('autoload'=>'no'),
                        array('option_name'=>'aikezi_solutions_version'),
                        array('%s'),
                        array('%s')
                    );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'no'),
                    array('option_name'=>'aikezi_solutions_contact'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'no'),
                    array('option_name'=>'aikezi_s_label'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'no'),
                    array('option_name'=>'aikezi_s_content'),
                    array('%s'),
                    array('%s')
                );
        $wpdb->update(
                    $table_name,
                    array('autoload'=>'no'),
                    array('option_name'=>'aikezi_s_id'),
                    array('%s'),
                    array('%s')
                );
    }
    
    

}