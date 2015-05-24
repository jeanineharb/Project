@extends('app') 

@section('content')

<div class="row">
	<div class="col-xs-6 col-md-4"></div>
		<div class="col-xs-6 col-md-4" style="text-align: center;">
			<h1> {{ $temp->templateName }} </h1>
		</div>
		<div class="col-xs-6 col-md-4">
		<div class="row">
		<div class="col-xs-10 col-md-7" style="float: left; text-align: right; padding-right: 0;">
			<button type="button" class="btn btn-default" onclick="discard()">Discard</button>
			</div>
			<div class="col-xs-6 col-md-5" style="float: right; padding-left: 3px;">
			<?php echo Form::open(['id' => 'tempForm']);
				  echo Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'save', 'style' => 'margin-right: 3px;']); 
				  echo Form::submit('Send', ['class' => 'btn btn-success', 'id' => 'send']); 
				  echo Form::close(); ?>
				  </div>
				  </div>
		</div>
</div>

<div contenteditable="true">

<?php
echo $temp->html;
echo $temp->css;
?>

<style type="text/css">
	*[contenteditable="true"]{
		padding: 10px;
	}
</style>

</div>

<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/ckeditor/inlineEditorWithCustomButton.js') }}"></script>
<script src="{{ asset('/bootbox.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script>

// var x = document.getElementsByTagName("field");
// var i;
// var att=[];
// for (i = 0; i < x.length; i++) {
// att[i]=x.item(i).attributes.getNamedItem("id").value;
// console.log(att[i]);

$(document).ready(function() {
	// $('#tempForm').click(function(e){
	$('#tempForm').on("click", ":submit", function(e){
		e.preventDefault();

		var $d = "";
		for (var i in CKEDITOR.instances){
			$d += CKEDITOR.instances[i].getData();
		}

		var $post = {};
		$post.action = $(this).val();
		$post.cat = '<?php echo $temp->category; ?>';
		$post.html = $d;
		$post.css = '<?php echo str_replace("\n", "\\n", $temp->css);?>';
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
			top.location.href = "{{ url('/template') }}";
		}
		else{
			bootbox.hideAll();
		}
	}); 
}
</script>


@endsection