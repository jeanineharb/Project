@extends('app') 

@section('content')

<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4" style="text-align: center;">
  	<h1> {{ $temp->templateName }} </h1>
  </div>
  <div class="col-xs-6 col-md-4" style="text-align: right;">
  	<button type="button" class="btn btn-default" onclick="discard()">Discard</button>
  	<button type="button" class="btn btn-default" onclick="onSubmit()">Save</button>
  </div>
</div>

<?php
echo $temp->html;
echo $temp->css;
?>

<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('/ckeditor/inlineEditorWithCustomButton.js') }}"></script>
<script src="{{ asset('/bootbox.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

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

		//console.log(data);

		var x = document.getElementsByTagName("field");
		var i;
		var att=[];
		for (i = 0; i < x.length; i++) {
			att[i]=x.item(i).attributes.getNamedItem("id").value;
			console.log(att[i]);
		}

 		//redirect("{{ asset('/ckeditor/samples/sample_posteddata.php')}}", "variable", data);
}


function discard(){
	bootbox.confirm("Are you sure you want to discard your changes?", function(result) {
		if(result) {
            top.location.href = "{{ url('/template') }}";
        }
        else{
        	bootbox.hideAll();
        }
	}); 
}
</script>


@endsection