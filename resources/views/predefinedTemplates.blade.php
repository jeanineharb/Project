@extends('app') 

@section('content')

	<div class="row">
		<div class="col-sm-3 col-md-6">
		<h2> Templates <small> Pick the template that fits your needs!</small></h2>
		</div>
		<div class="col-sm-3 col-md-6" style="text-align: right; padding-top: 20px;">
			<button type="button" class="btn btn-info">Create Custom Template!</button>
		</div>
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
									<p> <a href="{{ route('pick.temp', $t->templateId) }}" class="btn btn-info btn-xs" role="button"> Pick! </a> </p>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				@elseif( (!$ut->isEmpty()) && $c->categoryId == 1)
					<div class="row">
					@foreach ($ut as $u)
					@foreach ($u->templates as $t)
						<div class="col-xs-18 col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="http://placehold.it/500x300" alt="500x300">
								<div class="caption">
									<h4> {{ $t->templateName }} </h4>
									<p> <a href="{{ route('upload', $t->templateId) }}" class="btn btn-success btn-xs" role="button"> Send! </a> 
										<a href="{{ route('edit.temp', $t->templateId) }}" class="btn btn-info btn-xs" role="button"> Edit </a> 
										<a href="{{ route('delete.temp', $t->templateId) }}" class="btn btn-danger btn-xs" role="button"> Delete </a> </p>
								</div>
							</div>
						</div>
					@endforeach
					@endforeach
					</div>
				@else
					<div class="alert alert-info">
						Empty category! <a href="{{ url('/template/new') }}"> Create your own template. </a>
					</div>
					
				@endif
				</div>
			@endforeach
		</div>
	</div>






@endsection