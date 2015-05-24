@extends('app') 

@section('content')

	<div class="page-header">
		<h2> Predefined Templates <small> Pick the template that fits your needs!</small></h2>
	</div>

	<div class="tabbable tabs-left">
		<ul class="nav nav-tabs">
			@foreach ($cat as $c)
				@if($c->categoryId == 1)
					<li class="active"><a href="#{{ $c->categoryId }}" data-toggle="tab">{{ $c->categoryName }}</a></li>
				@else
	  				<li><a href="#{{ $c->categoryId }}" data-toggle="tab">{{ $c->categoryName }}</a></li>
	  			@endif
	  		@endforeach
		</ul>

		<div class="tab-content">
			@foreach ($cat as $c)
				@if($c->categoryId == 1)
					<div class="tab-pane active" id="{{ $c->categoryId }}">
				@else
	  				<div class="tab-pane" id="{{ $c->categoryId }}">
	  			@endif

	  			<div class="well" style="margin-top: 10px;">
	  				{{ $c->categoryDesc }}
				</div>

				@if(! $c->predefinedTemplates->isEmpty())
					<div class="row">
					@foreach ($c->predefinedTemplates as $t)
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
				@elseif( (!$ut->isEmpty()) && $c->categoryId == 1)
					<div class="row">
					@foreach ($ut as $u)
					@foreach ($u->temps as $t)
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
					@endforeach
					</div>
				@else
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Empty category! <a href="{{ url('/template/new') }}"> Create your own template. </a>
					</div>
					
				@endif
				</div>
			@endforeach
		</div>
	</div>






@endsection