jQuery(document).ready(function($){
	
	var update = function(){
		$("#css_editor").val( editors.getSession().getValue() );
	}
	
	$("#cusomt_css_save").submit( update );	
});





var editors = ace.edit('customCSS');
editors.setTheme('ace/theme/monokai');
editors.getSession().setMode('ace/mode/css');