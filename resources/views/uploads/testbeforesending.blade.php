@extends('app') 

@section('content')


<<<<<<< HEAD
=======


>>>>>>> mans
<div class="row" style="margin-bottom: 30px;">
	<div class="col-sm-6 col-md-12">
		<h2> Mail Preview <small> This is how your email will look like to one of the recipients</small></h2>
	</div>
</div>



<?php echo Form::open(['id' => 'sendForm']); 
echo '<h4> Do you want to proceed? </h4>';
<<<<<<< HEAD
 echo Form::submit('Send mails', ['class' => 'btn btn-primary', 'id' => 'submitButton']);
 echo '<img src="'.asset('/images/loading.gif').'" id="loading" style="display: none;" />';
=======
 echo Form::submit('Send mails', ['class' => 'btn btn-primary']);
>>>>>>> mans
 echo Form::close(); 

 echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
<<<<<<< HEAD
	$("#sendForm").on("click", ":submit", function(e){
		e.preventDefault();

		$("#submitButton").addClass("disabled");
 		$("#submitButton").removeAttr("data-toggle");
		$("#loading").show();

		var $post = {};
		$post.id ="'.$id.'";
		$post.d = \''.$data.'\';
		console.log($post.d);
		$post._token = $("input[name=_token]").val();

=======
 //$("#sendForm").click(function(e){

	$("#sendForm").on("click", ":submit", function(e){
		e.preventDefault();
		var $post = {};
		$post.id ="'.$id.'";
		$post.d = \''.$data.'\';
		$post._token = $("input[name=_token]").val();


>>>>>>> mans
		var $url ="';
		echo route("send.mails");
		echo '";

		$.ajax({
			url: $url,
			data: $post,
			method: "POST",
			success: function(response){
				 window.location.href = response;
<<<<<<< HEAD
				 // console.log(response);
=======
>>>>>>> mans
			}
		});
	});
});
 </script>';

 
echo View::make('usertemplatesblades.'.$id,$randomData)->render() ?>

@endsection