<!DOCTYPE html>
<html>
<header>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
</head>  
<body>
<div class="wrap">
    <h2>Contact Infomation</h2>
    <p>Add your store's contact information here and use the shortcode below to display it anywhere you like.<br/>Thêm thông tin liên hệ của cửa hàng tại đây. Sau đó bạn có thể sử dụng shortcode để hiển thị bất kỳ đâu bạn muốn.</p>
    <?php settings_errors( $this -> _menuSlug, false, false ); ?>
    <form method="post" action="options.php" id="aikezi_pd_form_setting" 
          enctype="multipart/form-data">
        <?php echo settings_fields( 'aikezi_solutions_options' ); ?>
        <?php echo do_settings_sections( $this -> _menuSlug ); ?>
        <p class="submit">
            <input id="submit" class="button button-primary" type="submit" name="submit" value="Save Change">
        </p>
    </form>

</div>
</body>
</html>