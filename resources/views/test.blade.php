@extends('app')

@section('content')
<?php
if ($data['error']) {
echo "wrong file format";
}
else{
	foreach($data['xml'] as $petit) { 
			echo "string2";
				echo $petit[0]." <br>";
				echo $petit[1]." <br>";
			}	
}
?>
@endsection