@extends('app') 

@section('content')


@foreach ($temp as $t)
     <li><a href="{{ route('edit.temp', $t->templateId) }}"> {{ $t->templateName }} </a></li>
     <!-- {{ $t->category()->first()->categoryName }} -->

@endforeach



@endsection