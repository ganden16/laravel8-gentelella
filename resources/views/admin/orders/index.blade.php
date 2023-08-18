@extends('admin.layouts.admin')

@section('title', __('orders'))

@section('content')
<a href="{{ route('admin.orders.create') }}">Add New Order</a>
<div class="row">
	<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>{{ __('order_code') }}</th>
				<th>{{ __('product_name') }}</th>
				<th>{{ __('quantity') }}</th>
				<th>{{ __('action') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td>{{ $order->order_code }}</td>
				<td>{{ $order->product->name }}</td>
				<td>{{ $order->qty }}</td>
				<td>
					<a class="btn btn-xs btn-primary" href="{{ route('admin.orders.show', [$order->id]) }}"
						data-toggle="tooltip" data-placement="top" data-title="{{ __('view') }}">
						<i class="fa fa-eye"></i>
					</a>
					<a class="btn btn-xs btn-info" href="{{ route('admin.orders.edit', [$order->id]) }}"
						data-toggle="tooltip" data-placement="top" data-title="{{ __('edit') }}">
						<i class="fa fa-pencil"></i>
					</a>
					<form id="deleteorderForm{{ $order->id }}" method="post" action="/admin/orders/{{ $order->id }}"
						class="btn btn-xs btn-danger user_destroy" data-toggle="tooltip" data-placement="top"
						data-title="{{ __('delete') }}">
						@csrf
						@method('delete')
						<i onclick="handleSubmitDeleteorder({{ $order->id }})" class="fa fa-trash"></i>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pull-right">
		{{ $orders->links() }}
	</div>
</div>

<script>
	function handleSubmitDeleteorder(id){
		document.getElementById(`deleteorderForm${id}`).submit()
	}
</script>
@endsection