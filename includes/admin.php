<?php

class AikeziSoluionsAdmin {
    public $_menuSlug = 'aikezi-solutions';
    public $_setting_options;
    public function __construct() {
        $this -> _setting_options    = get_option('aikezi_solutions_contact',
                                                array ());
        add_action('admin_menu', array ($this, 'aikeziSolutionsMenuPage'));
        add_action('admin_init', array ($this, 'aikeziSolutionsAddField'));
    }
    
    //Add menu Aikezi Solutions
    public function aikeziSolutionsMenuPage() {
        $menuIcon = AIKEZI_S_IMAGE_URL . '/plugin-icon-1.png';
        //Content Info Page
        add_menu_page('Contact Info Settings', 'Aikezi Solutions',
                      'publish_pages', $this -> _menuSlug,
                      array ($this, 'aikeiziSolutionsInfoPage'), $menuIcon);
        //Content Addon Page
        add_submenu_page($this -> _menuSlug, 'Aikezi Addon',
                         'Aikezi Addon', 'publish_pages',
                         $this -> _menuSlug . '-aikezi-addon',
                         array ($this, 'aikeiziSolutionsAddonPage'));
        //Content Donate Page
        add_submenu_page($this -> _menuSlug, 'Aikezi Donate', 'Donate',
                         'publish_pages', $this -> _menuSlug . '-aikezi-donate', array ($this, 'aikeiziSolutionsDonatePage'));
    }
    //Register settings field to database options
    public function aikeziSolutionsAddField() {
        register_setting('aikezi_solutions_options', 'aikezi_solutions_contact',              array ($this, 'validate_info'));
        
        //Shortcode section
        $shortcodeSectionId = 'aikezi_solutions_shortcode_section';
        add_settings_section($shortcodeSectionId, 'Shortcode',
                              array ($this, 'aikezi_solution_shortcode_view'),
                              $this -> _menuSlug);
        
        //Info section 
        $infoSectionId = 'aikezi_solutions_info_section';
        add_settings_section($infoSectionId, 'Infomation',
                              array ($this, 'aikezi_solution_info_view'),
                              $this -> _menuSlug);
                              
        add_settings_field('aikezi_solutions_label_id', '',
                           array ($this, 'aikezi_solutions_shortcode_label'),
                           $this -> _menuSlug, $infoSectionId);
        add_settings_field('aikezi_solutions_content_logo', '',
                           array ($this, 'aikezi_solutions_shortcode_label'),
                           $this -> _menuSlug, $infoSectionId);
    }
    
    public function validate_info($data_input) {
        
        //input form process
        $error = array ();
        //Validate for Label form input
        if (!empty($_POST['aikezi_s_label'])) {
            foreach ($_POST['aikezi_s_label'] as $AzlVal) {
                if (mb_strlen($AzlVal) > 75) {
                    $error['AzSLabel'] = 'Label too long: Please enter less than 75 characters.';
                } elseif (strpos($AzlVal, '|') > 0) {
                    $error['AzSLabel'] = 'Label error: Don\'t use "|" , please change it!';
                }
            }
            if (!isset($error['AzSLabel'])) {
                $AzSImplode = implode('|', $_POST['aikezi_s_label']);
                $AzSImplodeNew = sanitize_text_field($AzSImplode);
                $aikeziSLabel = explode( '|', $AzSImplodeNew );
                update_option('aikezi_s_label',  $aikeziSLabel);
            }
        }
        //Validate for Content form input
        if (!empty($_POST['aikezi_s_content'])) {
            foreach ($_POST['aikezi_s_content'] as $AzcVal) {
                if (mb_strlen($AzcVal) > 150) {
                    $error['AzSContent'] = 'Content too long: Please enter less than 150 characters.';
                } elseif (strpos($AzcVal, '|') > 0) {
                    $error['AzSContent'] = 'Content error: Don\'t use "|" , please change it!';
                }
            }
            if (!isset($error['AzSContent'])) {
                $AzSImplodeC = implode('|', $_POST['aikezi_s_content']);
                $AzSImplodeCNew = sanitize_text_field($AzSImplodeC);
                $aikeziSContent = explode( '|', $AzSImplodeCNew );
                update_option('aikezi_s_content',  $aikeziSContent);
            }
        }

        if(!empty($_POST['aikezi_solutions_option_name'])) {
            if ( $this -> fileExtensionsValidate( $_POST['aikezi_solutions_image_fullName'], "JPG|PNG|GIF" ) == false ) {
                $error['aikezi_solutions_content_logo'] = "File upload error: only use .jpg, .png, .gif.";
            } else {
                $altImage = '';
                if(!empty($_POST['aikezi_solutions_image_alt'])){
                    $altImage = $_POST['aikezi_solutions_image_alt'];
                }

                $data_input['aikezi_solutions_logo_url']= $_POST['aikezi_solutions_option_name'];
                $data_input['aikezi_solutions_logo_alt']= $altImage;
            }
        } else {
            if(!empty($this -> _setting_options['aikezi_solutions_logo_url'])){
                $data_input['aikezi_solutions_logo_url']=$this -> _setting_options['aikezi_solutions_logo_url'];
                $data_input['aikezi_solutions_logo_alt']=$this -> _setting_options['aikezi_solutions_logo_alt'];
            };
        }
            
        if ( count($error) > 0 ) {
            get_option('aikezi_s_label', array ());
            get_option('aikezi_s_content', array ());
            $data_input  = $this -> _setting_options;
            $strError    = '';
            foreach ( $error as $key => $val ) {
                $strError .= $val . '<br />';
            }
            add_settings_error( $this -> _menuSlug, 'setting-error-aikezi-solutions', $strError, 'error' );
        } else {
            add_settings_error( $this -> _menuSlug, 'setting-error-aikezi-solutions', 'Saved change', 'updated' );
        }
      return $data_input;
    }
    
    //Check logo form condition
    private function fileExtensionsValidate( $file_name, $file_type ) {
        $flag = false;
        $pattern = '/^.*\.(' . strtolower( $file_type ) . ')$/i'; //$file_type =                                                         JPG|PNG|GIF
        if ( preg_match( $pattern, strtolower( $file_name ) ) == 1 ) {
            $flag = true;
        }
        
        return $flag;
    }
    //info form input
    public function aikezi_solutions_shortcode_label(){
        require_once AIKEZI_S_INCLUDE_DIR . '/views/info-form.php';
    }
    //shortcode section content
    public function aikezi_solution_shortcode_view () {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/shortcode-section.php';
    }
    //Info section
    public function aikezi_solution_info_view() {
        
    }
    //Content Info Page
    public function aikeiziSolutionsInfoPage() {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/contact-info-page.php';
    }
    //Content Addon Page
    public function aikeiziSolutionsAddonPage() {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/aikezi-addon.php';
    }
    //Content Donate Page
    public function aikeiziSolutionsDonatePage() {
        require_once AIKEZI_S_INCLUDE_DIR . '/views/aikezi-donate.php';
    }
}