<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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
	}

	public function post()
	{
	}

	public function edit()
	{
	}

	public function put()
	{
	}

	public function delete($id)
	{
		Order::destroy($id);
		return redirect()->back();
	}
}