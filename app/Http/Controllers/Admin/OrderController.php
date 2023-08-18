<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
	public function index()
	{
		$orders = Order::paginate(10);
		return view('admin.orders.index', ['orders' => $orders]);
	}

	public function show(Order $order)
	{
		return view('admin.orders.show', compact('order'));
	}

	public function create()
	{
		$products = Product::all();
		return view('admin.orders.create', compact('products'));
	}

	public function post(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'product_id' => 'required',
			'quantity' => 'required|numeric',
			'discount' => 'required|numeric',
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin.orders.create')
				->withErrors($validator)
				->withInput();
		}
		$order = new Order;
		$order->product_id = (int)$request->product_id;
		$order->order_code = Str::random(10);
		$order->discount = $request->discount;
		$order->qty = $request->quantity;
		$order->total_price = $request->total_price;
		$order->save();

		$product = Product::find((int)$request->product_id);
		$product->quantity = $product->quantity - $request->quantity;
		$product->save();

		return redirect()->route('admin.orders');
	}

	public function edit(Order $order)
	{
		$products = Product::all();
		return view('admin.orders.edit',compact('order','products'));
	}

	public function put(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'quantity' => 'required|numeric',
			'discount' => 'required|numeric',
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin.orders.edit')
				->withErrors($validator)
				->withInput();
		}

		$order = Order::find($id);
		$product = Product::find($order->product->id);

		$product->quantity = $product->quantity + $order->qty - $request->quantity;
		$product->save();

		$order->qty = $request->quantity;
		$order->discount = $request->discount;
		$order->total_price = $request->total_price;
		$order->save();

		return redirect()->route('admin.orders');

	}

	public function delete($id)
	{
		Order::destroy($id);
		return redirect()->back();
	}
}
