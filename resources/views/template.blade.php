@extends('app') 

@section('content')

<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4" style="text-align: center;">
  	<h1>
	  	<?php 
	  		use App\Template;
	  		$temp = Template::find(2);
	  		echo $temp->templateName;
	  	?>
  	</h1>
  </div>
  <div class="col-xs-6 col-md-4" style="text-align: right;">
  	<button type="button" class="btn btn-default">Discard</button>
  	<button type="button" class="btn btn-default" onclick="onSubmit()">Save</button>
  </div>
</div>

<?php
echo $temp->html;
echo $temp->css;
?>

<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/ckeditor/inlineEditorWithCustomButton.js') }}"></script>

<script>
function redirect(redirectUrl, arg, value) {
	  var form = $('<form action="' + redirectUrl + '" method="post"' +
	  '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
	  $('body').append(form);
	  $(form).submit();
}
	
function onSubmit(){
		var data = "";
		
		for (var i in CKEDITOR.instances){
			data += CKEDITOR.instances[i].getData();
		}

		console.log(data);

 		redirect("{{ asset('/ckeditor/samples/sample_posteddata.php')}}", "variable", data);
}

</script>
					
@endsection