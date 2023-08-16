<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('products')->insert([
			'name' => 'Plossa',
			'price' => 13000,
			'quantity' => 100,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		DB::table('products')->insert([
			'name' => 'Minyak Kapak',
			'price' => 22000,
			'quantity' => 80,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		DB::table('products')->insert([
			'name' => 'Mixagrip',
			'price' => 3000,
			'quantity' => 200,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
	}
}
