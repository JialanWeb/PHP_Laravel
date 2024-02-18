<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $post = [
        'Programmierung' => 'Programmierung macht spaß',
        'Tanzen' => 'Tanzen tue ich sehr gerne',
        'Laufen' => 'Frische Luft tut gut',
        'Laravel' => 'Laravel ist mächtig und sehr einfach',
        'PHP' => 'PHP ist sehr einfach',
        'Weihnachten' => 'Glühwein schmeckt gut',
        'Sonne und Strand' => 'Sonne tut immer gut',
        'Meer' => 'Am Meer bin ich sehr gerne',
       ];

       foreach($post AS $key => $value) {
            $post = new Post([
                'titel' => $key,
                'comment' => $value
            ]);
            $post->save();
       }#ende foreach
    }#ende run
}
