@extends('admin.layouts.admin')

@section('title',__('title_name', ['title' => 'Edit Order', 'name' => $order->order_code]) )

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::open(['route'=>['admin.orders.put', $order->id],'method' => 'put','class'=>'form-horizontal
		form-label-left']) }}

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_id">
				{{ __('product_name') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="product_id" value="{{ $order->product->name }}"
					class="form-control col-md-7 col-xs-12 input" name="product_id" readonly>
				@if($errors->has('product_id'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('product_id') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
				{{ __('price') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="price" value="{{ $order->product->price }}"
					class="form-control col-md-7 col-xs-12 input" name="price" readonly>
				@if($errors->has('price'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('price') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="quantity">
				{{ __('quantity') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="quantity" value="{{ $order->qty }}" onchange="handleChangeInput()"
					class="form-control col-md-7 col-xs-12 input" name="quantity">
				@if($errors->has('quantity'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('quantity') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="discount">
				{{ __('discount') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="discount" onchange="handleChangeInput()" class="form-control col-md-7 col-xs-12 input"
					name="discount" value="{{ $order->discount }}">
				@if($errors->has('discount'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('discount') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="total_price">
				{{ __('total_price') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="total_price" class="form-control col-md-7 col-xs-12 input"
					name="total_price" value="{{ $order->total_price }}" readonly>
				@if($errors->has('total_price'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('total_price') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('cancel') }}</a>
				<button type="submit" class="btn btn-success"> {{ __('save') }}</button>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>

<script>
	function handleChangeInput(){
		inputs = document.getElementsByClassName("input")
		price = inputs[1].value || 0
		quantity = inputs[2].value || 0
		discount = inputs[3].value || 0
		totalPrice = price * quantity - discount * price / 100
		inputs[4].value = totalPrice
		if(inputs[4].value == 'NaN') inputs[4].value = 0
		
	}
</script>
@endsection