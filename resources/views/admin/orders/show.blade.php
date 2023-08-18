@extends('admin.layouts.admin')

@section('title', __('title_name', ['title' => 'Detail Order', 'name' => $order->order_code]))

@section('content')
<div class="row">
	<table class="table table-striped table-hover">
		<tbody>
			<tr>
				<th>{{ __('order_code') }}</th>
				<td>{{ $order->order_code}}</td>
			</tr>
			<tr>
				<th>{{ __('name') }}</th>
				<td>{{ $order->product->name }}</td>
			</tr>
			<tr>
				<th>{{ __('price') }}</th>
				<td>{{ $order->product->price }}</td>
			</tr>
			<tr>
				<th>{{ __('quantity') }}</th>
				<td>{{ $order->qty }}</td>
			</tr>
			<tr>
				<th>{{ __('discount') }}</th>
				<td>{{ $order->discount }}</td>
			</tr>
			<tr>
				<th>{{ __('total_price') }}</th>
				<td>{{ $order->total_price }}</td>
			</tr>
			<tr>
				<th>{{ __('created_at') }}</th>
				<td>{{ $order->created_at }}</td>
			</tr>
			<tr>
				<th>{{ __('updated_at') }}</th>
				<td>{{ $order->updated_at }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection