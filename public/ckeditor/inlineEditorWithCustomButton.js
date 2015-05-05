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

	editor.addCommand('varDialog', new CKEDITOR.dialogCommand('varDialog'));

	editor.ui.addButton('Var', {
	    label: 'Insert Variable Text',
	    command: 'varDialog',
	    toolbar: 'insert',
	    icon: 'skins/icy_orange/images/add.png'
	});

	CKEDITOR.dialog.add('varDialog', function (editor) {
	    return {
	        title: 'Variable Text Properties',
	        minWidth: 400,
	        minHeight: 200,
	        contents: [
	            {
	                id: 'tab-basic',
	                label: 'Basic Settings',
	                elements: [
	                    {
	                        type: 'text',
	                        id: 'var',
	                        label: 'Id',
	                        validate: CKEDITOR.dialog.validate.notEmpty("Id field cannot be empty")
	                },
	                    {
	                        type: 'text',
	                        id: 'title',
	                        label: 'Value',
	                        validate: CKEDITOR.dialog.validate.notEmpty("Value field cannot be empty")
	                    }
	                ]
	            }
	        ],
	        onOk: function(){
	            var dialog = this;
	            var field = editor.document.createElement('field');
	            field.setAttribute('id', dialog.getValueOf('tab-basic', 'var'));
	            field.setAttribute('style', 'border: 1px solid #f00;');
	            text = dialog.getValueOf('tab-basic', 'title').toUpperCase();
	            field.setText('$'+text);
	            editor.insertElement(field);
	        }
	    };
	});

});