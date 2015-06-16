@extends('app') 

@section('content')

<?php 

if ($error) {
	echo "<font color='red'>".$error."</font>";
}

?>

     <form enctype="multipart/form-data" action="/postupload/{{$id}}" method="POST">
      <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

      Send this file: <input name="userfile" type="file" />
            <br>

      <input type="submit" value="Send File" />
     </form>

@endsection