<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::firstOrCreate([
            'name' => 'Dian Busana',
            'description' => 'Lorem Ipsum',
            'logo' => 'http://placekitten.com/100/100'
        ]);
    }
}
