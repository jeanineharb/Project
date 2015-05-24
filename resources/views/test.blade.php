@extends('app') 

@section('content')

<?php
foreach($data as $petit) { 

echo "string2";

echo $petit[0]." <br>";
echo $petit[1]." <br>";


}
?>

hi!



@endsection