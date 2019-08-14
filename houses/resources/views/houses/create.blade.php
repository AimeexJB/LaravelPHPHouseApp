@extends('layouts.app')

@section('content')

<div class="container">

	<h2>Add New House</h2>

	<hr>

	<form method="POST" action="{{ route('houses.store') }}">

		{{ csrf_field() }} <!-- cross site request forgery. generates a hidden input field with this token -->

		<table class="table">

			 <div class="form-group">
			    <label>Property Name</label>
			    <input type="name" class="form-control" id="name" name="name" placeholder="Property Name" value="{{ old('name') }}">
			    @if ($errors->has('name'))
			    	<p class="text-danger">
			    		{{ $errors->first('name') }}
			    	</p>
			    @endif
			</div>

			<div class="form-group">
			    <label>For Sale/Rent</label>
			    <input type="salerent" class="form-control" id="salerent" name="salerent" placeholder="Sale/Rent" value="{{ old('salerent') }}">
			    @if ($errors->has('salerent'))
			    	<p class="text-danger">
			    		{{ $errors->first('salerent') }}
			    	</p>
			    @endif
			</div>

			<div class="form-group">
			    <label>Description</label>
			    <input type="description" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
			    @if ($errors->has('description'))
			    	<p class="text-danger">
			    		{{ $errors->first('description') }}
			    	</p>
			    @endif
			</div>

			<div class="form-group">
			    <label>Price</label>
			    <input type="price" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
			    @if ($errors->has('price'))
			    	<p class="text-danger">
			    		{{ $errors->first('price') }}
			    	</p>
			    @endif
			</div>

			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" id="submit" value="submit" class="btn btn-info" />
					<a href="{{ route('houses.index') }}" class="btn btn-link">Cancel</a>
				</td>
			</tr>

		</table>

	</form>

</div>

@endsection
