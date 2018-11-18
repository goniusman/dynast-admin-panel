
<?php settings_errors(); ?>

<ul class="dynasty-tab">
	<li class="tab"><a class="active" href="admin.php?page=admin_page_option">Admin <a></li>
	<li class="tab"><a href="admin.php?page=theme_support_option">Support <a></li>
	<li class="tab"><a href="admin.php?page=contact_form_select_page">Contact Us <a></li>	
	<li class="tab"><a href="admin.php?page=admin_css_editor">Css <a></li>	
</ul>


<?php

		$picture = esc_attr(get_option( 'profile_picture' ) );
		$fname = esc_attr(get_option('fname'));
		$lname = esc_attr(get_option('lname'));
		$description = esc_attr(get_option('description'));
		$address = esc_attr(get_option('address'));
		$facebook = esc_attr(get_option('facebook'));
		$twitter = esc_attr(get_option('twitter'));
		$linkedin = esc_attr(get_option('linkedin'));
		$youtube = esc_attr(get_option('youtube'));

?>

<div class="admin-extro">
<div class="admin-intro">
	
	<div class="pro-pictur">
		<div class="img">
			<img src="<?php echo $picture; ?>" alt="">
		</div>
		
	</div>
	<div class="bio">
		<div class="name">
			<p><?php echo $fname; ?> <?php echo $lname; ?></p>
		</div>
		<div class="description">
			<p><?php echo $description; ?></p>
		</div>
	</div>
	<div class="sociallink">
		<ul>
			<li><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook"></i></a></li>
			<li><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a></li>
			<li><a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></a></li>
		</ul>
	</div>
	
	
</div>
</div>


<form method="post" action="options.php" class="admin-page-form">
			 <div class="notice"> <p> At first fill this form and go to the widget area to display your identity on your website </p> </div>
	<?php settings_fields('admin-panel-register'); ?>
	<?php do_settings_sections('admin_page_option'); ?>
	
	<?php  submit_button(); ?>
</form>






















