@extends('admin.layouts.admin')

@section('title',__('title', ['title' => 'Add New Order']) )

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::open(['route'=>['admin.orders.post'],'method' => 'post','class'=>'form-horizontal
		form-label-left']) }}

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_id">
				{{ __('product_name') }}
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<select id="product_id" onchange="handleChangeSelectProduct()" name="product_id"
					class="select2 input form-control col-md-7 col-xs-12" style="width: 100%" autocomplete="off">
					<option>Pilih Product</option>
					@foreach($products as $product)
					<option value="{{ $product->id }}">{{$product->name }}</option>
					@endforeach
				</select>
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('product_id') as $error)
					<li class="parsley-required">{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
				{{ __('price') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="price" onchange="handleChangeInput()" class="form-control col-md-7 col-xs-12 input" name="price"
					value="{{ old('price') }}" readonly>
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
				<input id="quantity" onchange="handleChangeInput()" class="form-control col-md-7 col-xs-12 input"
					name="quantity" value="{{ old('quantity') }}">
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
					name="discount" value="{{ old('discount') }}">
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
				<input id="total_price" onchange="handleChangeInput()" class="form-control col-md-7 col-xs-12 input"
					name="total_price" value="{{ old('total_price') }}" readonly>
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

	function handleChangeSelectProduct(){
		product_id = document.getElementById("product_id")
		console.log(product_id.value)
		price = document.getElementById("price")
		if(!product_id.value){
			price.value = 0
		}else{
			var xhr = new XMLHttpRequest()
      xhr.open('GET', '/admin/products/find/' + product_id.value, true)
		xhr.onload = function() {
			if (xhr.status === 200) {
				var response = JSON.parse(xhr.responseText)
				price.value = response[0].price
				product_id.value = response[0].id
			} else {
				console.error('Request failed. Status:', xhr.status)
			}
		}
		xhr.send()
		}
	}
</script>
@endsection