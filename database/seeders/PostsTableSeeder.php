<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        $author_ids = User::where('user_role', 'admin')->pluck('id')->toArray();
        $posts = [];

        foreach (range(1, 10) as $i) {
            $image_name_with_extension = $faker->image('public/img', 300, 250, null, true);
            $path_parts = pathinfo($image_name_with_extension);
            $image_name = $path_parts['filename'];
            $image_extension = $path_parts['extension'];

        $posts[] = [
            'title' => $faker->words($nb = 3, $asText = true),
            'excerpt' => $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'content' => $faker->text($maxNbChars = 200),
            'image' => $image_name_with_extension,
            'author_id' => $faker->randomElement($author_ids),
            'updated_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
            'created_at' => $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
        ];

        Storage::move("public/img/$image_name_with_extension", "public/posts/$image_name_with_extension");
    }

    DB::table('posts')->insert(array_map(function ($post) use ($image_extension) {
        $post['image'] = pathinfo($post['image'], PATHINFO_FILENAME) . '.' . $image_extension;
        return $post;
    }, $posts));

    }
}