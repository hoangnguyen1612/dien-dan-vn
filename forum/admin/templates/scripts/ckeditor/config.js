/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/forum/admin/templates/scripts/ckfinder/ckfinder.html';

	config.filebrowserImageBrowseUrl = '/forum/admin/templates/scripts/ckfinder/ckfinder.html?type=Images';

	config.filebrowserFlashBrowseUrl = '/forum/admin/templates/scripts/ckfinder/ckfinder.html?type=Flash';

	config.filebrowserUploadUrl = '/forum/admin/templates/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

	config.filebrowserImageUploadUrl = '/forum/admin/templates/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

	config.filebrowserFlashUploadUrl = '/forum/admin/templates/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
