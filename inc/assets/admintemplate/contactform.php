<?php settings_errors(); ?>
<ul class="dynasty-tab">
	<li class="tab"><a href="admin.php?page=admin_page_option">Admin <a></li>
	<li class="tab"><a href="admin.php?page=theme_support_option">Support <a></li>
	<li class="tab"><a class="active" href="admin.php?page=contact_form_select_page">Contact Us <a></li>	
	<li class="tab"><a href="admin.php?page=admin_css_editor">Css <a></li>	
</ul>
<div class="dynasty-page">
	<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
	<p><code>[contact_form]</code></p>
	<form method="post" action="options.php">

		<?php settings_fields('contact-form-setting'); ?>
		<?php do_settings_sections('contact_form_select_page'); ?>
		
		<?php  submit_button(); ?>
	</form>
</div>