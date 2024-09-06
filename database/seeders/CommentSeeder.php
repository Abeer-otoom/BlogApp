<?php

namespace Database\Seeders;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'content' => 'Hello  admin',
                'user_id' =>2,
                'post_id'=>1,
                'created_at'=>Carbon::now()
            ],

            [
                'content' => 'Welcome  admin',
                'user_id' =>3,
                'post_id'=>2,
                'created_at'=>Carbon::now()

            ],


        ];

        Comment::insert($data);
    }
}
