@extends('layouts.app')

@section('content')

@if (count($houses) === 0)
	<p>There are no Houses </p>

@else
<div class="container">
	<h2>Houses <a class="btn btn-info" href="{{ route('houses.create') }}">Add</a></h2>

	@if (Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}

		</div>
	@endif



	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Sale/Rent</th>
				<th>Description</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($houses as $house)
				<tr>
					<td>{{ $house->name }}</td>
					<td>{{ $house->salerent }}</td>
					<td>{{ $house->description }}</td>
					<td>{{ $house->price }}m</td>

					<td>

						<form method="POST" action="{{ route('houses.destroy', $house->id) }}" >
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<a href="{{ route('houses.show', $house->id) }}" class="btn btn-default">View</a>
							<a href="{{ route('houses.edit', $house->id) }}" class="btn btn-primary">Edit</a>
							<button type="submit" class="btn btn-danger"> Delete</button>
						</form>

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<hr>

</div>


@endif

@endsection
