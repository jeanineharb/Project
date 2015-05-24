@extends('app') 

@section('content')

	<div class="page-header">
		<h2> New Template <small> Create your own template!</small></h2>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">

				<form action="{{ asset('/ckeditor/samples/sample_posteddata.php')}}"
					method="post">
					<textarea name="editor1" id="editor1" rows="10" cols="80">
						<style>
						*{
							font-family:lucida sans unicode,lucida grande,sans-serif;
						}
						</style>
						
						<h2> My Template!</h2>
						<p> Lorem ipsum dolor sit amet dolor duis blandit vestibulum faucibus a, tortor. </p>
            		</textarea>

            		<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
					<script src="{{ asset('/ckeditor/fullEditorWithCustomButton.js') }}"></script>
					
					<p> <input type="submit" value="Submit"> </p>

				</form>
			</div>
		</div>
	</div>
@endsection
