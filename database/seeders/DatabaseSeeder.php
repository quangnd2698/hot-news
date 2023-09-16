<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Admin::create([
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('12345678'),
            'name' => 'admin'
        ]);

        \App\Models\Category::insert([
            [
                'name' => 'Chính trị',
                'slug' => 'chinh-tri',
            ],
            [
                'name' => 'Xã hội',
                'slug' => 'xa-hoi',
            ],
            [
                'name' => 'Thể thao',
                'slug' => 'the-thao',
            ],
        ]);
    }
}
