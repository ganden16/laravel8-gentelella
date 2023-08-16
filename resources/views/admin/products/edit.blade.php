@extends('admin.layouts.admin')

@section('title',__('title_name', ['title' => 'Edit Product', 'name' => $product->name]) )

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		{{ Form::open(['route'=>['admin.products.put',$product->id],'method' => 'put','class'=>'form-horizontal
		form-label-left']) }}

		<div class="form-group">
			<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
				{{ __('name') }}
				<span class="required">*</span>
			</label>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="name" class="form-control col-md-7 col-xs-12" name="name" value="{{ $product->name }}" required>
				@if($errors->has('name'))
				<ul class="parsley-errors-list filled">
					@foreach($errors->get('name') as $error)
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
				<input id="price" value="{{ $product->price }}" class="form-control col-md-7 col-xs-12 " name="price"
					required>
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
				<input id="quantity" value="{{ $product->quantity }}" class="form-control col-md-7 col-xs-12 "
					name="quantity" required>
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
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<a class="btn btn-primary" href="{{ URL::previous() }}"> {{ __('cancel') }}</a>
				<button type="submit" class="btn btn-success"> {{ __('save') }}</button>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection