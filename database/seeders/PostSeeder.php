<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'First Post',
                'content' => 'Hello from admin',
                'user_id' =>1,
                'created_at'=>Carbon::now()
            ],

            [
                'title' => 'Welcome',
                'content' => 'Welcome from admin',
                'user_id' =>1,
                'created_at'=>Carbon::now()

            ],


        ];

        Post::insert($data);

    }
}
