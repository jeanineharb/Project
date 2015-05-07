@extends('app') 

@section('content')

<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4" style="text-align: center;" contenteditable="true">
  	<h1>
	  	<?php 
	  		use App\Template;
	  		$temp = Template::find(1)->pluck('templateName');
	  		echo $temp;
	  	?>
  	</h1>
  </div>
  <div class="col-xs-6 col-md-4" style="text-align: right;">
  	<button type="button" class="btn btn-default">Discard</button>
  	<button type="button" class="btn btn-default">Save</button>
  </div>
	
</div>

<?php
$temp = Template::find(1)->pluck('html');
echo $temp;
?>
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/ckeditor/inlineEditorWithCustomButton.js') }}"></script>
					
@endsection