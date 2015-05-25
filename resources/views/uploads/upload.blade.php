@extends('app') 

@section('content')

<?php echo "<?php echo 'asdasd222asdasd';?>"; ?>

<!-- The data encoding type, enctype, MUST be specified as below -->
     <form enctype="multipart/form-data" action="/postupload/{{$id}}" method="POST">
     <!-- MAX_FILE_SIZE must precede the file input field -->
      <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

      <!-- Name of input element determines name in $_FILES array -->
      Send this file: <input name="userfile" type="file" />
            <br>

      <input type="submit" value="Send File" />
     </form>

@endsection