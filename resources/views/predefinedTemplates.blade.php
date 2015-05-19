@extends('app') 

@section('content')



	<div class="tabbable tabs-left">
		<ul class="nav nav-tabs">
			@foreach ($cat as $c)
	  			<li><a href="#{{ $c->categoryId }}" data-toggle="tab">{{ $c->categoryName }}</a></li>
	  		@endforeach
		</ul>
		<div class="tab-content">
			@foreach ($cat as $c)
				<div class="tab-pane" id="{{ $c->categoryId }}">
				@if(! $c->templates->isEmpty())
					<div class="row" style="margin-top: 10px;">
					@foreach ($c->templates as $t)
						<div class="col-xs-18 col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="http://placehold.it/500x300" alt="500x300">
								<div class="caption">
									<h4> {{ $t->templateName }} </h4>
									<p>Some sample text. Some sample text.</p>
									<p> <a href="{{ route('edit.temp', $t->templateId) }}" class="btn btn-info btn-xs" role="button"> Pick! </a> </p>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				@else
					<div class="alert alert-info" style="margin-top: 10px;">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Empty category! <a href="{{ url('/template/new') }}"> Create your own template. </a>
					</div>
					
				@endif
				</div>
			@endforeach
		</div>
	</div>






@endsection