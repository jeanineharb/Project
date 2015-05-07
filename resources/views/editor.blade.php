@extends('app') 

@section('content')

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<form action="{{ asset('/ckeditor/samples/sample_posteddata.php')}}"
					method="post">
					<textarea name="editor1" id="editor1" rows="10" cols="80">
                		This is my textarea to be replaced with CKEditor.
            		</textarea>

            		<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
					<script src="{{ asset('/ckeditor/fullEditorWithCustomButton.js') }}"></script>
					
					<p> <input type="submit" value="Submit"> </p>

				</form>
			</div>
		</div>
	</div>
@endsection
