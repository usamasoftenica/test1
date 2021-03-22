/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.extraPlugins = 'font';
	config.extraPlugins = 'indent';
	config.enterMode = CKEDITOR.ENTER_BR;
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config
	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.uiColor = '#92d050';

	
	// config.filebrowserBrowseUrl = 'http://www.coloradocampgrounds.development-env.com/images/';
	// config.UserFilesAbsolutePath = 'http://www.coloradocampgrounds.development-env.com/images/';
	// config.filebrowserUploadUrl = 'http://www.coloradocampgrounds.development-env.com/ckeditor-upload-image?id=1';
};

CKEDITOR.on( 'instanceCreated', function( e ){
 e.editor.addCss("@font-face{font-family:'Roboto'; src:url('https://fonts.googleapis.com/css?family=Roboto&display=swap');"  );
   });