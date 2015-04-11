@extends('app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<form action="{{ asset('/ckeditor/samples/sample_posteddata.php')}}" method="post">
					<textarea name="editor1" id="editor1" rows="10" cols="80">
                		This is my textarea to be replaced with CKEditor.
            		</textarea>

					<script>
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
		                    icon: '{{ asset("/ckeditor/skins/icy_orange/images/add.png") }}'
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
		                            field.setAttribute('style', 'background-color: #f00;');
		                            field.setText(dialog.getValueOf('tab-basic', 'title'));
		                            editor.insertElement(field);
		                        }
		                    };
		                });
            		</script>
					<p> <input type="submit" value="Submit"> </p>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
