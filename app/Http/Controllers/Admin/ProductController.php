<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::paginate(10);
		return view('admin.products.index', ['products' => $products]);
	}

	public function show(Product $product)
	{
		return view('admin.products.show', compact('product'));
	}

	public function findProduct(Product $product)
	{
		return response()->json([$product],200);
	}

	public function create()
	{
		return view('admin.products.create');
	}

	public function post(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|numeric',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric',
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin.products.create')
				->withErrors($validator)
				->withInput();
		}
		$product = new Product;

		$product->name = $request->name;
		$product->price = $request->price;
		$product->quantity = $request->quantity;
		$product->save();

		return redirect()->route('admin.products');
	}

	public function edit(Product $product)
	{
		return view('admin.products.edit', compact('product'));
	}

	public function put(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric',
		]);

		if ($validator->fails()) {
			return redirect()
				->route('admin.products.create')
				->withErrors($validator)
				->withInput();
		}

		$product = Product::find($id);
		$product->name = $request->name;
		$product->price = $request->price;
		$product->quantity = $request->quantity;

		$product->save();
		return redirect()->route('admin.products');
	}

	public function delete($id)
	{
		Product::destroy($id);
		return redirect()->back();
	}
}
