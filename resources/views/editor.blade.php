@extends('app') 

@section('content')

<div class="row">
	<div class="col-xs-8 col-md-6">
		<div class="page-header" style="border-bottom: none;">
			<h2> New Template <small> Create your own template!</small></h2>
		</div>
	</div>
	<div class="col-xs-4 col-md-2"></div>
	<div class="col-xs-6 col-md-4">
		<div class="row" style="margin-top: 40px;">
			<div class="col-xs-4 col-md-3" style="float: right; text-align: left; padding-left: 0;">
				<button type="button" class="btn btn-default" onclick="discard()">Discard</button>
			</div>
			<div class="col-xs-4 col-md-3" style="float: right; text-align: right; padding-right: 0;">
				<?php echo Form::open(['id' => 'tempForm']);
					  echo Form::submit('Save', ['class' => 'btn btn-primary', 'id' => $action, 'style' => 'margin-right: 3px;']); 
					  echo Form::close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
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
		</div>
	</div>
</div>

<script src="{{ asset('/js/bootbox.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>

$(document).ready(function() {
	// $('#tempForm').click(function(e){
	$('#tempForm').on("click", ":submit", function(e){
		e.preventDefault();

		var $d = editor.getData();
		console.log($d);

		var $post = {};
		$post.action = '<?php echo $action; ?>';
		$post.cat = 1;
		$post.html = $d;
		$post.css = '';
		$post._token = $('input[name=_token]').val();

		var $url = "{{ route('save.temp') }}"

		console.log($post);

		$.ajax({
			url: $url,
			data: $post,
			method: 'POST',
			success: function(response){
				window.location.href = response;
				// console.log(response);
			}
		});
	});
});


function discard(){
	bootbox.confirm("Are you sure you want to discard your changes?", function(result){
		if(result){
			top.location.href = "{{ url('/templates') }}";
		}
		else{
			bootbox.hideAll();
		}
	}); 
}
</script>
@endsection
