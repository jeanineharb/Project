@extends('app') 

@section('content')


@foreach ($temp as $t)
     <li>{{ $t->category()->first()->categoryName }}</li>
@endforeach



@endsection