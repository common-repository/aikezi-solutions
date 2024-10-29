<!DOCTYPE html>
<html>
<header>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<?php 
    wp_enqueue_script( 'aikezi-script-for-donate', AIKEZI_S_ASSETS_URL . '/js/script.js');
    wp_enqueue_style('aikezi-css-for-donate', AIKEZI_S_ASSETS_URL . '/css/donate-page.css');
    
?>

</head>  
<body>
<div class="wrap">
    <h2>Buy Me A Coffee!</h2>
    <?php
        $imgDonate = AIKEZI_S_IMAGE_URL . '/buy-me-a-coffee-1.jpg';
        $acbDonate = AIKEZI_S_IMAGE_URL . '/buy-me-a-coffee-4.png';
        $paypalDonate = AIKEZI_S_IMAGE_URL . '/buy-me-a-coffee-2.png';
        $momoDonate = AIKEZI_S_IMAGE_URL . '/buy-me-a-coffee-3.png';
        $popDonate = AIKEZI_S_IMAGE_URL . '/buy-me-a-coffee-5.jpg';
    ?>
    <div class="aikezi-solutions-donate">
        <p class="aikezi-solutions-donate-top">I hope to create menu useful and practical applications to better serve your work. The Aikezi’s staff worked tirelessly to make everything perfect. They are great people</p>
        <h3 class="aikezi-solutions-donate-title">Can You Buy Me A Coffee?</h3>
        <div class="aikezi-solutions-donate-desc">
            <div class="aikezi-solutions-donate-img">
                <img src="<?php echo esc_html($imgDonate); ?>" />
            </div>
            <p class="aikezi-solutions-donate-content">We thank you for choosing us. Hopefully our applications are useful for your work. That would make us even more proud! Can you buy me a coffee? And that what motivates us to keep giving<br> 
            <strong>This is a completely voluntary, polite and meaningful activity. We thank you very much!</strong></p>
        </div>
        <div class="aikezi-solutions-donate-button">
            <a href="javascript:void(0)" id="aikezi-solutions-modal-btn" class="aikezi-solutions-donate-pop"><img src="<?php echo esc_html($acbDonate); ?>" class="aikezi-solutions-donate-acb"/></a>
            <div id="aikezi-solutions-modal" class="aikezi-solutions-donate-modal">
                <div class="aikezi-solutions-donate-m-content">
                    <span class="ASclose">&times;</span>
                    <img src="<?php echo esc_html($popDonate); ?>" class="aikezi-solutions-donate-info"/>
                </div>
            </div>
            <a href="https://paypal.me/aikezi?country.x=VN&locale.x=vi_VN" class="aikezi-solutions-donate-click" target="_blank"><img src="<?php echo esc_html($paypalDonate); ?>" class="aikezi-solutions-donate-paypal"/></a>
            <a href="https://me.momo.vn/x3IbTdtRiVU4sjsyt8s5Uw" class="aikezi-solutions-donate-click" target="_blank"><img src="<?php echo esc_html($momoDonate); ?>" class="aikezi-solutions-donate-momo"/></a>
        </div>
    </div>
</div>
</body>
</html>
