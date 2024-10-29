<!DOCTYPE html>
<html>
<header>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<?php 
    wp_enqueue_style('aikezi-css-for-form', AIKEZI_S_ASSETS_URL . 'css/form.css'); 
    wp_enqueue_script( 'custom-js', AIKEZI_S_ASSETS_URL . 'js/getImage.js', array('jquery'), '1.0', true );
?>
</head>  
<body>  
<?php 
    $labelvalue   = get_option('aikezi_s_label');
    $contentvalue = get_option('aikezi_s_content');
    require_once AIKEZI_S_INCLUDE_DIR . '/views/form-group.php';
    $htmlObj = new AikeziSolutionsFormGroup();
    
?>
<form name="FormData" method="post" action="options.php" class="aikezi_solution_form_change">
<div class="wrapper">
    <span class="aikezi_s_form_group">
        <p><b>Note:</b> We recommend entering plain text. You should not use html, css or php code, ... may cause unexpected errors.  <br/> Enter less than 75 charecters for the Label and less them 150 characts for the Content. Don't use the "|" sign. </p><br/><br/></span>
        <?php
            for ($i = 0; $i <= 9; $i++) {
        echo $htmlObj -> aikeziSolutionsCreateGroup($i);
    }
        ?>
    <span class="aikezi_s_form_group">
        <p>Select 1 photo and only .jpg, .png or .gif format are supported.</p>
        <div class="content-logo">
            <?php
                if ( !empty($this -> _setting_options) ) {
                    echo "<div class='aikezi_solution_image_visible'><img src='" . $this -> _setting_options['aikezi_solutions_logo_url'] . "'
                          width='200' /></div>";
                }
            ?>
            
             <input id="aikezi_solutions_image_button" type="button" value="<?php echo esc_html("Browse Photos"); ?>" class="button-secondary" />
             <input id="aikezi_solutions_logo_fullName" name="aikezi_solutions_image_fullName" type="text" value="" />
            <input id="aikezi_solutions_logo_image" class="regular-text code" type="hidden" name="aikezi_solutions_option_name" value="">
            
            <input id="aikezi_solutions_image_alt" name="aikezi_solutions_image_alt" type="hidden" value="" />

            
        </div>
    </span>
</div>
</form>

</body>  
</html>