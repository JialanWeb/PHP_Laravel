<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = [
            'Sport' => 'danger',
            'Entspannung' => 'secondary',
            'Natur' => 'success',
            'Programmierung' => 'primary',
            'Musik' => 'warning',
            'Medien' => 'dark',
            'Reisen' => 'info',
           ];
    
           foreach($tag AS $key => $value) {
            $tag = new Tag(
                    [
                        'name' => $key,
                        'style' => $value
                    ]
                );
                $tag->save();
           }#ende foreach
    
    }#ende run
}

