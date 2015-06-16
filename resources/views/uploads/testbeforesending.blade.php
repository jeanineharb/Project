@extends('app') 

@section('content')


<div class="row" style="margin-bottom: 30px;">
	<div class="col-sm-6 col-md-12">
		<h2> Mail Preview <small> This is how some of the emails will look like to your recipients.</small></h2>
	</div>
</div>



<?php echo Form::open(['id' => 'sendForm']); 
echo '<h4> Do you want to proceed? </h4>';
 echo Form::submit('Send mails', ['class' => 'btn btn-primary', 'id' => 'submitButton']);
 echo '<img src="'.asset('/images/loading.gif').'" id="loading" style="display: none;" />';
 echo Form::close(); 

 echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
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

		var $url ="';
		echo route("send.mails");
		echo '";

		$.ajax({
			url: $url,
			data: $post,
			method: "POST",
			success: function(response){
				 window.location.href = response;
				 // console.log(response);
			}
		});
	});
});
 </script>';


		$i=0;
		foreach ($clientsData as $key => $client){
			if ($i>3) {
				break;
			}
			if (strcmp($key, "subject")==0) {
				continue;
			}
			echo '<div class="well">
	<div class="row">
	<h4>To : '.$client['nameTo'].' ('.$client['emailTo'].')'.'</h4>
	</div>
</div>';
 			echo "<hr>";

			echo View::make('usertemplatesblades.'.$id,$client)->render();
 			echo "<hr>";

 			$i++;

		}


?>

@endsection