@extends('admin.layouts.admin')

@section('title', __('products'))

@section('content')
<a href="{{ route('admin.products.create') }}">Add New Product</a>
<div class="row">
	<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>{{ __('name') }}</th>
				<th>{{ __('price') }}</th>
				<th>{{ __('action') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->price }}</td>
				<td>
					<a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', [$product->id]) }}"
						data-toggle="tooltip" data-placement="top" data-title="{{ __('view') }}">
						<i class="fa fa-eye"></i>
					</a>
					<a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', [$product->id]) }}"
						data-toggle="tooltip" data-placement="top" data-title="{{ __('edit') }}">
						<i class="fa fa-pencil"></i>
					</a>
					<form id="deleteProductForm{{ $product->id }}" method="post" action="/admin/products/{{ $product->id }}"
						class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top"
						data-title="{{ __('delete') }}">
						@csrf
						@method('delete')
						<i onclick="handleSubmitDeleteProduct({{ $product->id }})" class="fa fa-trash"></i>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right">
		{{ $products->links() }}
	</div>
</div>

<script>
	function handleSubmitDeleteProduct(id){
		document.getElementById(`deleteProductForm${id}`).submit()
	}
</script>
@endsection