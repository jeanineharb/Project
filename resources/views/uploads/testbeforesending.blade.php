@extends('app') 

@section('content')

<?php

echo 'This is how your email will look like to one of the recipients. Do you want to proceed ?<form enctype="multipart/form-data" action="/postupload/{{$data}}" method="POST">
	<input type="submit" value="Send Emails" />
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	</form>';
echo View::make('usertemplatesblades.'.$id,$data);//->with('data', $XMLdata);
?>

@endsection