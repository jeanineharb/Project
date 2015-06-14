@extends('app') 

@section('content')

<?php 

if ($error) {
	echo "<font color='red'>".$error."</font>";
}

?>

<div class="row">
	<div class="col-sm-6 col-md-12">
		<h2> Upload <small> Upload an XML file to fill the template with customized data</small></h2>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 col-md-12">
		<?php echo Form::open(['id' => 'uploadForm', 'enctype' => 'multipart/form-data', 'action' => array('UploadFileController@postupload', $id), 'method' => 'POST']);
			  echo Form::hidden('MAX_FILE_SIZE', '300000'); ?>

		<h4> Select an XML file from your computer: </h4>

		<?php echo Form::file('userfile', ['id' => 'uploadFiles']);
			  echo Form::submit('Upload', ['class' => 'btn btn-primary', 'style' => 'margin-right: 3px;']); ?>

		 <!-- Drop Zone -->
		<h4>Or drag and drop files below: </h4>
		<div class="upload-drop-zone" id="drop-zone">
			Just drag and drop files here
		</div>

		<?php echo Form::close(); ?>
	</div>
</div>

<!-- The data encoding type, enctype, MUST be specified as below -->
<!-- 	<form enctype="multipart/form-data" action="/postupload/{{$id}}" method="POST">
	 MAX_FILE_SIZE must precede the file input field -->
		<!-- <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
 -->
		<!-- Name of input element determines name in $_FILES array -->
		<!-- Choose file: <input name="userfile" type="file" /> <br/>

		<input type="submit" value="Send File" />
	</form> --> 

<style type="text/css">
	.upload-drop-zone {
		height: 200px;
		border-width: 2px;
		margin-bottom: 20px;
	}

	.upload-drop-zone {
		color: #ccc;
		border-style: dashed;
		border-color: #ccc;
		line-height: 200px;
		text-align: center
	}

	.upload-drop-zone.drop {
		color: #222;
		border-color: #222;
	}

</style>

<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">

    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('uploadForm');

    var startUpload = function(files) {
        console.log(files)
    }

    uploadForm.addEventListener('submit', function(e) {
        var uploadFiles = document.getElementById('uploadFiles').files;
        e.preventDefault()

        startUpload(uploadFiles)
    })

    dropZone.ondrop = function(e) {
        e.preventDefault();
        this.className = 'upload-drop-zone';

        startUpload(e.dataTransfer.files)
    }

    dropZone.ondragover = function() {
        this.className = 'upload-drop-zone drop';
        return false;
    }

    dropZone.ondragleave = function() {
        this.className = 'upload-drop-zone';
        return false;
    }

</script> -->

@endsection