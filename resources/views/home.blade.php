@extends('app')

@section('content')
	<div class="container-fluid">
		@include('main.common',['somes'=>$somes])
	</div>
@endsection
