@extends('app') 

@section('content')

<script src="{{ asset('/js/bootbox.min.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="http://www.appelsiini.net/download/jquery.jeditable.mini.js"></script>




	<div class="row">
		<div class="col-sm-3 col-md-6">
		<h2> Templates <small> Pick the template that fits your needs!</small></h2>
		</div>
		<div class="col-sm-3 col-md-6" style="text-align: right; padding-top: 20px;">
			<a href="{{ route('new.temp') }}" class="btn btn-info" role="button"> Create Custom Template! </a>
		</div>
	</div>

	<div class="tabbable tabs-left">
	<!-- Categories -->
		<ul class="nav nav-tabs">
			@foreach ($cat as $c)
				@if($c->categoryId == 1)
					<li class="active"><a href="#tab{{ $c->categoryId }}" data-toggle="tab">{{ $c->categoryName }}</a></li>
				@else
	  				<li><a href="#tab{{ $c->categoryId }}" data-toggle="tab">{{ $c->categoryName }}</a></li>
	  			@endif
	  		@endforeach
		</ul>

		<div class="tab-content">
			@foreach ($cat as $c)
				@if($c->categoryId == 1)
					<div class="tab-pane active" id="tab{{ $c->categoryId }}">
				@else
	  				<div class="tab-pane" id="tab{{ $c->categoryId }}">
	  			@endif

	  			<div class="well" style="margin-top: 10px;">
	  				{{ $c->categoryDesc }}
				</div>

				@if(! $c->predefinedTemplates->isEmpty())
					<div class="row">
					@foreach ($c->predefinedTemplates as $t)
						<div class="col-xs-18 col-sm-6 col-md-3">
							<div class="thumbnail">
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
								<div class="caption">
									<h4 class="tempName" id="{{ $t->templateId }}"> {{ $t->templateName }} </h4>
									<h6> Created on: {{ date('F d, Y', strtotime($t->created_at)) }} <br/>
										 Last modified: {{ date('F d, Y', strtotime($t->updated_at)) }} </h6>
									<p> <a href="{{ route('upload', $t->templateId) }}" class="btn btn-success btn-xs" role="button"> Send! </a> 
										<a href="{{ route('edit.temp', $t->templateId) }}" class="btn btn-info btn-xs" role="button"> Edit </a> 
										<a class="btn btn-danger btn-xs" role="button" onclick="deleteTemp(this.id)" id="{{ $t->templateId }}"> Delete </a> </p>
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


<script type="text/javascript">

$('.tempName').editable(function(value) {
	var $url = "{{ route('rename.temp') }}";

	var $post = {};
	$post.id = $(this).attr('id');
	$post.value = value;

	$.ajax({
		url: $url,
		data: $post,
		method: 'POST',
		success: function(response){
			// console.log(response);
			window.location.href = response;
		}
	});
}, {
	indicator: '{{ asset("/images/loading.gif") }}',
	tooltip  : 'Click to edit',
	select   : true,
	type     : 'textarea',
	submit   : 'OK',
});


function deleteTemp(id){
	bootbox.confirm("Are you sure you want to delete this template?", function(result){
		if(result){
			top.location.href = "{{ url('/template/delete')}}/"+id;
			// bootbox.hideAll();
		}
		else{
			bootbox.hideAll();
		}
	}); 
}

</script>






@endsection