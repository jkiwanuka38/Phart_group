<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Electronics', 'slug' => 'electronics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Surveillance', 'slug' => 'surveillance', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Construction', 'slug' => 'construction', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
