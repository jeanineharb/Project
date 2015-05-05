/**
 * 
 */

editor = CKEDITOR.replace( 'editor1', {
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