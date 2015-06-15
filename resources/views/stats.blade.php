@extends('app')

@section('content')

<style type="text/css">
	.centered{
		text-align: center;
	}
</style>

<div class="row">
	<div class="col-sm-4 col-md-8">
		<h2> Statistics <small> Check if your mails were successfully sent!</small></h2>
	</div>
</div>

@if($batches->isEmpty())
	
@else
	@foreach($batches as $bat)
		<div class="panel panel-default">
			<div class="panel-heading">
		 		<h4> Batch Subject: {{ $bat->subject }} </h4>
		 		<p> Sent on: {{ date('F d, Y', strtotime($bat->created_at)) }} at {{ date('g:i a', strtotime($bat->created_at)) }}</p>
			</div>

			<div class="panel-body">
			<table width="50%">
				<tr> 
					<th> Recipient Email </th>
					<th class="centered"> Status </th>
				</tr>

				@foreach($bat->mails as $m)
					<tr> <td> {{ $m->recipientEmail }} </td>
						 <td class="centered">
					@if($m->isSent)
						<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #82B755"></span>
					@else
						<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: #BA554D"></span>
					@endif
					</td></tr>
				@endforeach
			</table>
			</div>
		</div>
	@endforeach
@endif

@endsection