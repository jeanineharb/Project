@extends('app') 

@section('content')

<?php
foreach($templates as $template){
	echo $template->templateName;
}

?>

@endsection