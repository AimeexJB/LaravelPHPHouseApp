@extends('layouts.app')

@section('content')

<div class="container">

	<h2>House Details</h2>

	<table class="table">
		<tr>
			<td>Name</td>
			<td>
				{{ $house->name }}
			</td>
		</tr>
		<tr>
			<td>Description</td>
			<td>
				{{ $house->description }}
			</td>
		</tr>
		<tr>
			<td>Sale/Rent</td>
			<td>
				{{ $house->salerent }}
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
				{{ $house->price }}m
			</td>
		</tr>
		</table>


		<a href="{{ route('houses.index') }}" class="btn btn-link">Back</a>


</div>

@endsection
