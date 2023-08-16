@extends('admin.layouts.admin')

@section('title', __('title_name', ['name' => $product->name, 'title'=>'Detail']))

@section('content')
<div class="row">
	<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<th>{{ __('name') }}</th>
				<td>{{ $product->name }}</td>
			</tr>
			<tr>
				<th>{{ __('price') }}</th>
				<td>{{ $product->price }}</td>
			</tr>
			<tr>
				<th>{{ __('quantity') }}</th>
				<td>{{ $product->quantity }}</td>
			</tr>
			<tr>
				<th>{{ __('created_at') }}</th>
				<td>{{ $product->created_at }}</td>
			</tr>
			<tr>
				<th>{{ __('updated_at') }}</th>
				<td>{{ $product->updated_at }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection