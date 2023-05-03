<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Item;
use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Item::factory(8)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'name'=>"Khant Min Kyi",
            'email'=>"admin@gmail.com",
            'password'=>Hash::make('asdasdasd')
        ]);
        Owner::create([
            'name'=>"KMK",
            'phone'=>"324234234",
            'address'=>"Botahtaung",
            'latitude'=>"16.779452797237106",
            'longitude'=>"96.15937989252826",
        ]);
        Category::create([
            'name'=>"Electronic",
            'photo'=>"item.jpg",
        ]);
    }
}
