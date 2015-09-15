tinymce.init({ 
		menu: {},
		toolbar: "undo redo | bold italic | hr | bullist numlist | removeformat fullscreen code" ,
        selector: "textarea",
        theme : "modern",
        plugins : ["fullscreen code hr"],
		browser_spellcheck : true,
		remove_trailing_brs: true,
		mode: 'exact',
		add_unload_trigger: false, 
		schema:"html5", 
		invalid_elements: "span", 
		extended_valid_elements : "span[!class]", 
		paste_remove_styles: true,
		forced_root_block : false, 
		verify_html : false,
		cleanup : true

});