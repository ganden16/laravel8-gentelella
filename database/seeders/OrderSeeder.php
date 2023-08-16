<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('orders')->insert([
			'product_id' => 1,
			'order_code' => Str::random(10),
			'qty' => 3,
			'discount' => 10,
			'total_price' => 35100,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		DB::table('orders')->insert([
			'product_id' => 2,
			'order_code' => Str::random(10),
			'qty' => 2,
			'discount' => 5,
			'total_price' => 41800,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		DB::table('orders')->insert([
			'product_id' => 3,
			'order_code' => Str::random(10),
			'qty' => 4,
			'discount' => 10,
			'total_price' => 10800,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}
}
