jQuery( document ).ready(function ($) {

	/* Testing the Logo Image onLoad */
	var aikezi_solutions_logo_url_val = $("#aikezi_solutions_image_button").val();
	aikezi_solutions_logo_testImage(aikezi_solutions_logo_url_val); 

	function aikezi_solutions_logo_testImage(URL) {
		if(URL != "Select Image" && URL){
			var tester=new Image();
		    tester.src=URL;
		}
	}

	$('#aikezi_solutions_image_button').click(function(e){ 
		e.preventDefault();
		var aikezi_solutions_uploader = wp.media({
			title: 'Select Image',
			button: { text: 'Select Image' },
			multiple: false
		}).on('select', function(){
			var attachment = aikezi_solutions_uploader.state().get('selection').first().toJSON();
			$('#aikezi_solutions_logo_image').val(attachment.url);
			$('#aikezi_solutions_admin_preview').attr("src", attachment.url);
			$('#aikezi_solutions_admin_hover_preview').attr("src",  attachment.url); /* Also update the preview image */
			$(".aikezi_solutions-preview-blocks").css("display","block");
			$(".aikezi_solutions-error-logo-url").css("display","none");
            $('#aikezi_solutions_admin_preview').attr('alt', attachment.alt);
            $('#aikezi_solutions_logo_fullName').val(attachment.filename);
            $('#aikezi_solutions_image_alt').val(attachment.alt);
		}).open();
	});

	$('#aikezi_solutions_hover_effect').on('change', function(){
		var selectedHover = $('#aikezi_solutions_hover_effect').val();
		$('#aikezi_solutions_admin_hover_preview').removeClass();
		$('#aikezi_solutions_admin_hover_preview').addClass(selectedHover);
	});

	/* Check Image Field */
		$('.aikezi_solution_form_change').on('submit', function () {
			var csl_CustomSiteLogo_logo_image = $('input#aikezi_solution_logo_image').attr('value');    // Getting Width Value

			if ((csl_CustomSiteLogo_logo_image === '' || csl_CustomSiteLogo_logo_image === null)) {
				alert("Please select the img.");
				return false;
			}
		});
	
});