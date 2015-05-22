@extends('app') 

@section('content')

@foreach($data as $d)
	<p> {{ $d[0]}}  {{ $d[1]}}</p>

@endforeach


@endsection