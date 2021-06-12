<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([
            'post_id' => 2,
            'commentor_name' => Str::random(10),
            'comment' => Str::random(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
