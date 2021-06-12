<?php

namespace Database\Seeders;

use Carbon\Traits\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('posts')->insert([
            'post_title' => Str::random(5),
            'post_description' => Str::random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
