jQuery(document).ready(function(){
	
/* contact form submission */

	var js = jQuery.noConflict();
	js('#dynastContactForm').on('submit', function(e){

		e.preventDefault();

		js('.has-error').removeClass('has-error');
		js('.js-show-feedback').removeClass('js-show-feedback');

		var form = js(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');

		if( name === '' ){
			js('#name').parent('.form-group').addClass('has-error');
			return;
		}

		if( email === '' ){
			js('#email').parent('.form-group').addClass('has-error');
			return;
		}

		if( message === '' ){
			js('#message').parent('.form-group').addClass('has-error');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		js('.js-form-submission').addClass('js-show-feedback');

		js.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				name : name,
				email : email,
				message : message,
				action: 'dap_custom_action_form'	
			},
			error : function( response ){
				js('.js-form-submission').removeClass('js-show-feedback');
				js('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){
					
					setTimeout(function(){
						js('.js-form-submission').removeClass('js-show-feedback');
						js('.js-form-error').addClass('js-show-feedback');
						form.find('input, button, textarea').removeAttr('disabled', 'disabled');
					},1500);

				} else {
					
					setTimeout(function(){
						js('.js-form-submission').removeClass('js-show-feedback');
						js('.js-form-success').addClass('js-show-feedback');
						form.find('input, button, textarea').attr('disabled').val('');
					},1500);

				}
			}
			
		});

	});
	
});