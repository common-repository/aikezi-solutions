<?php
class AikeziSolutionsCreateShortcode {
    public function __construct() {
        add_shortcode( 'aikezi_info', 
                        array ($this, 'aikezi_solutions_create_shortcode' ));
        add_shortcode( 'aikezi_info_photo',
                        array ($this, 'aikezi_solutions_create_photo') );
        add_action( 'wp_enqueue_scripts', array ($this,'aikezi_s_scripts') );
    }
    
    //Shortcode display all infomation
    public function aikezi_s_scripts() {
        wp_enqueue_style('aikezi-css-label', AIKEZI_S_ASSETS_URL . 'css/info-label.css');
    }
    
    public function aikezi_solutions_create_shortcode($arInfo) {
        $labelvalue   = get_option('aikezi_s_label');
        $contentvalue = get_option('aikezi_s_content');
        $a = array (
                 'a' => '<div class="aikezi-contact-label">' . $labelvalue[0] . '</div>',
                 'b' => '<div class="aikezi-contact-label">' . $labelvalue[1] . '</div>',
                 'c' => '<div class="aikezi-contact-label">' . $labelvalue[2] . '</div>',
                 'd' => '<div class="aikezi-contact-label">' . $labelvalue[3] . '</div>',
                 'e' => '<div class="aikezi-contact-label">' . $labelvalue[4] . '</div>',
                 'f' => '<div class="aikezi-contact-label">' . $labelvalue[5] . '</div>',
                 'g' => '<div class="aikezi-contact-label">' . $labelvalue[6] . '</div>',
                 'h' => '<div class="aikezi-contact-label">' . $labelvalue[7] . '</div>',
                 'i' => '<div class="aikezi-contact-label">' . $labelvalue[8] . '</div>',
                 'k' => '<div class="aikezi-contact-label">' . $labelvalue[9] . '</div>',
                    );
        $b = array (
                 'o' => '<div class="aikezi-contact-content">' . $contentvalue[0] . '</div>',
                 'p' => '<div class="aikezi-contact-content">' . $contentvalue[1] . '</div>',
                 'q' => '<div class="aikezi-contact-content">' . $contentvalue[2] . '</div>',
                 'r' => '<div class="aikezi-contact-content">' . $contentvalue[3] . '</div>',
                 's' => '<div class="aikezi-contact-content">' . $contentvalue[4] . '</div>',
                 't' => '<div class="aikezi-contact-content">' . $contentvalue[5] . '</div>',
                 'u' => '<div class="aikezi-contact-content">' . $contentvalue[6] . '</div>',
                 'v' => '<div class="aikezi-contact-content">' . $contentvalue[7] . '</div>',
                 'w' => '<div class="aikezi-contact-content">' . $contentvalue[8] . '</div>',
                 'x' => '<div class="aikezi-contact-content">' . $contentvalue[9] . '</div>',
                    );
        $n = array (
                 1 => $a['a'] . $b['o'],
                 2 => $a['b'] . $b['p'],
                 3 => $a['c'] . $b['q'],
                 4 => $a['d'] . $b['r'],
                 5 => $a['e'] . $b['s'],
                 6 => $a['f'] . $b['t'],
                 7 => $a['g'] . $b['u'],
                 8 => $a['h'] . $b['v'],
                 9 => $a['i'] . $b['w'],
                 10 => $a['k'] . $b['x'],
                    );
        
        $attributes = shortcode_atts(
            array(
               'id' => '' 
                 ), 
                $arInfo
        );
        $aikeziInfo = '';
        if (empty($attributes['id'])) {
            $aikeziInfo = '<div class="aikezi-contact-info">' . implode('', $n) . '</div>';
        } else {
            $no_whitespaces = preg_replace( '/\s*,\s*/', ',', sanitize_text_field( $attributes['id']) );
            $id = explode( ',', $no_whitespaces );
            foreach ($id as $v) {
                $AzChangeV = intval($v);
                if ($AzChangeV > 0 && $AzChangeV <= 10) {
                $aikeziInfo .= '<div class="aikezi-contact-info">' . $n[$AzChangeV] . '</div>';
                } else {
                    $aikeziInfo = '<div class="aikezi-error-id">' . '<p>I am Sorry, but the [id="..?.."] must be an integer and 0 < id < 11. Let\'s fix them. Or remove the commas at the beginning and at the end [id=",...,"]</p>' . '</div>';
                }
            }
        }
        return  $aikeziInfo;
    }
    //Shortcode display image upload

    public function aikezi_solutions_create_photo() {
        $takeFilePath =  get_option('aikezi_solutions_contact',
                                                    array ());
        if ( !empty($takeFilePath['aikezi_solutions_logo_url']) ) {
                    $displayPhoto = '<div class="aikezi-added-photo"><img src="' . $takeFilePath['aikezi_solutions_logo_url'] . '" alt="'. $takeFilePath['aikezi_solutions_logo_alt'] . '"/></div>';
                    }
        return $displayPhoto;
    }
}







 