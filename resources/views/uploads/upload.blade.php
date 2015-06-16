@extends('app') 

@section('content')

<div class="row" style="margin-bottom: 30px;">
	<div class="col-sm-6 col-md-12">
		<h2> Upload <small> Upload an XML file to fill the template with customized data</small></h2>
	</div>
</div>

@if($error)
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>
		{{ $error }}
	</div>
@endif

<div class="well">
<div class="row">
	<div class="col-sm-6 col-md-12">
		<?php echo Form::open(['id' => 'uploadForm', 'enctype' => 'multipart/form-data', 'action' => array('UploadFileController@postupload', $id), 'method' => 'POST']);
			  echo Form::hidden('MAX_FILE_SIZE', '300000'); ?>

		<h4> Select an XML file from your computer: </h4>

		<div class="form-inline">
			<div class="form-group">
				<?php echo Form::file('userfile', ['id' => 'uploadFiles'], ['class' => 'btn btn-sm btn-primary', 'style' => 'margin-right: 3px;']); ?>
			</div>
				<?php echo Form::submit('Upload file', ['class' => 'btn btn-sm btn-primary', 'style' => 'margin-right: 3px;']);
					echo Form::close(); ?>
		</div>
	</div>
</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h4> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
		 Some tips! </h4>
	</div>

	<div class="panel-body">
		<p> Your XML document should be well-formed. </p>
	    <p> Your root node should have a 'subject' attribute to specify the email's subject</p>
	    <p> All your recipient nodes should have an 'emailTo' and a 'nameTo' attributes. </p>

	</div>
</div>

@endsection