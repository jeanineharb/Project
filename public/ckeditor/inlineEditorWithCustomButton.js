/**
 * 
 */



CKEDITOR.on( 'instanceCreated', function( event ) {
	var editor = event.editor,
		element = editor.element;

	// Customize editors for headers and tag list.
	// These editors don't need features like smileys, templates, iframes etc.
//	if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
//		// Customize the editor configurations on "configLoaded" event,
//		// which is fired after the configuration file loading and
//		// execution. This makes it possible to change the
//		// configurations before the editor initialization takes place.
//		editor.on( 'configLoaded', function() {
//
//			// Remove unnecessary plugins to make the editor simpler.
//			editor.config.removePlugins = 'colorbutton,find,flash,font,' +
//				'forms,iframe,image,newpage,removeformat,' +
//				'smiley,specialchar,stylescombo,templates';
//
//			// Rearrange the layout of the toolbar.
//			editor.config.toolbarGroups = [
//				{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
//				{ name: 'undo' },
//				{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
//				{ name: 'about' }
//			];
//		});
//	}
	editor.on( 'configLoaded', function() {
		editor.addCommand('varDialog', new CKEDITOR.dialogCommand('varDialog'));

		editor.ui.addButton('Var', {
		    label: 'Insert Variable Text',
		    command: 'varDialog',
		    toolbar: 'insert',
		    icon: 'skins/icy_orange/images/add.png'
		});

		editor.config.toolbar =
		[
			{ name: 'document', items : [ 'NewPage','Preview' ] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
			{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
			{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
		        'HiddenField' ] },
		    '/',
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
			'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image','Flash','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe','Table', 'Var' ] },
			'/',
			{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
		];

		CKEDITOR.dialog.add('varDialog', function (editor) {
		    return {
		        title: 'Variable Text Properties',
		        minWidth: 400,
		        minHeight: 200,
		        contents: [
		            {
		                id: 'tab-basic',
		                label: 'Basic Tab',
		                elements: [
		                    {
		                        type: 'text',
		                        id: 'name',
		                        label: 'Tag Name',
		                        validate: CKEDITOR.dialog.validate.notEmpty("Tag Name cannot be empty")
		                	}
		               	]
		            }
		        ],
		        onOk: function(){
		            var dialog = this;
		            var field = editor.document.createElement('span');
		            text = dialog.getValueOf('tab-basic', 'name');
		            field.setText('{{$'+text+'}}');
		            editor.insertElement(field);
		        }
		    };
		});
	});

});