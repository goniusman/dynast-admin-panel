(function($){
	$(document).ready(function($){
		// first widget 
		
		
			$('#upload-button').live('click', function(g){
			g.preventDefault();
				if(mediauploder){
					mediauploder.open();
					return;
				}
				
				
			var mediauploder= wp.media({
					'title' : 'Upload Author pictur',
					'button' : {
						'Text' : 'Set The image'
					},
					'multiple' : false,
				});
			
			
			
			
			mediauploder.on("select", function(){
				var image_linke = mediauploder.state().get("selection").first().toJSON();
				
				var link = image_linke.url;
				$("#profile-picture").val(link);

			});
				mediauploder.open();
			
		});	
		
		$('#remove-picture').live('click',function(e){
		
			e.preventDefault();
			var answer = confirm("Are you sure you want to remove your Profile Picture?");
			if( answer == true ){
				$('#profile-picture').val('');
				//$('.sunset-general-form').submit();
			}
			return;
		});

		
		
		$('#image-uploader').live('click', function(g){
			g.preventDefault();
			var mediauploder = wp.media({
					'title' : 'Upload Author pictur',
					'button' : {
						'Text' : 'Set The image'
					},
					'multiple' : false,
				});
			
			mediauploder.open();
			
			
			mediauploder.on("select", function(){
				var image_linked = mediauploder.state().get("selection").first().toJSON();
				
				var link = image_linked.url;
				
				$("input.my_link").val( link );	
				
				$(".image img").attr('src', link);
			
			});
			
		});
		
		
		
		// sexcon widget
		$('#sobi-upload').live('click', function(e){
			e.preventDefault();
			
			var imageUplad = wp.media({
					'title' : 'Upload Author pictur',
					'button' : {
						'text' : 'Set The image'
					},
					'multiple' : false,
				});
			
			
				imageUplad.open();
		
			
			imageUplad.on("select", function(){
				var imga_link = imageUplad.state().get("selection").first().toJSON();
				var link = imga_link.url;
				$("input.my_like").val( link );
				
				$(".image-form img").attr('src', link);			
				
				
			});
			

			
		});
		
		
		
		$('#widget_image').live('click', function(e){
		e.preventDefault();
		
		var mediaupload = wp.media({
			'title' : 'Upload Author pictur',
			'button' : {
				'Text' : 'Set The image'
			},
			'multiple' : false,
		});
		mediaupload.open();
		mediaupload.on('select', function(){
			var image_link = mediaupload.state().get('selection').first().toJASON();
			$("#image_put").add('src', image_link);
		});
		
	});

		
	});
	
	
}(jQuery));	
	
