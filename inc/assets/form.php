<?php 
/**
 * Contact form
 * @package Dynast
 */
?>

<div class="page-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29443.778101026855!2d90.361856!3d22.710681599999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1515259927981" width="100%" height="100%" frameborder="0" style="border:4" allowfullscreen></iframe>
</div>
	<div class="contact-us-section">
		<div class="container">
			<div class="row">			
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form id="dynastContactForm" class="dynast-contact-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

					<div class="form-group">
						<input type="text" class="form-control dynast-form-control" placeholder="Your Name" id="name" name="name">
						<small class="text-danger form-control-msg">Your Name is Required</small>
					</div>

					<div class="form-group">
						<input type="email" class="form-control dynast-form-control" placeholder="Your Email" id="email" name="email">
						<small class="text-danger form-control-msg">Your Email is Required</small>
					</div>

					<div class="form-group">
						<textarea name="message" id="message" class="form-control dynast-form-control" placeholder="Your Message"></textarea>
						<small class="text-danger form-control-msg">A Message is Required</small>
					</div>
					
					<div class="text-center">
						<button type="stubmit" class="btn btn-default btn-lg btn-dynast-form">Submit</button>
						<small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
						<small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
						<small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

