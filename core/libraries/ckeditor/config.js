/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.

	config.filebrowserBrowseUrl = '/core/libraries/filemanager/ckfindere.php';

	config.filebrowserImageBrowseUrl = '/core/libraries/filemanager/ckfindere.php?Type=Images';

	config.filebrowserFlashBrowseUrl = '/core/libraries/filemanager/ckfindere.php?Type=Flash';

	config.filebrowserUploadUrl = '/core/libraries/filemanager/core/connector/php/connector.php?command=QuickUpload&type;=Files';

	config.filebrowserImageUploadUrl = '/core/libraries/filemanager/core/connector/php/connector.php?command=QuickUpload&type;=Images';

	config.filebrowserFlashUploadUrl = '/core/libraries/filemanager/core/connector/php/connector.php?command=QuickUpload&type;=Flash';

	
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'mode','clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'document', 'doctools' ] },
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


	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
	config.protectedSource.push( /<a[\s\S]*?\>/g ); //allows beginning <span> tag
	config.protectedSource.push( /<\/a[\s\S]*?\>/g ); //allows ending </span> tag	

	config.protectedSource.push( /<div[\s\S]*?\>/g ); //allows beginning <span> tag
	config.protectedSource.push( /<\/div[\s\S]*?\>/g ); //allows ending </span> tag	

	
	config.extraPlugins = 'youtube';
	config.extraPlugins = 'showblocks';
	config.extraPlugins = 'colorbutton';
	config.skin = 'minimalist';
	
	
};
