/**
 * 
 */

editor = CKEDITOR.replace( 'editor1', {
    toolbar : 'FullToolbar',
    fullPage: true,
    allowedContent: true,
    extraPlugins: 'wysiwygarea'
});

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
            var field = editor.document.createElement('field');
            field.setAttribute('name', dialog.getValueOf('tab-basic', 'name'));
            text = dialog.getValueOf('tab-basic', 'name');
            field.setText('{{$'+text+'}}');
            editor.insertElement(field);
        }
    };
});