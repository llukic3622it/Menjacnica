<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => "Dinar",
            'description'=>'Valuta drzave Srbije'
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => "Euro",
            'description'=>'Valuta Evropske unije'
        ]);


        DB::table('categories')->insert([
            'id' => 3,
            'name' => "Dolar",
            'description'=>'Valuta SAD-a'
        ]);


        DB::table(table: 'products')->insert([
            'name' => "Kupovni kurs dinara",
            'description'=>'Kurs po kojem banka ili menjačnica kupuje stranu valutu od tebe.',
            'price'=>116.00,
            'category_id' => 1

        ]);

        DB::table(table: 'products')->insert([
            'name' => "Prodajni kurs dinara",
            'description'=>'Kurs po kojem banka ili menjačnica prodaje stranu valutu tebi.',
            'price'=>114.00,
            'category_id' => 1

        ]);

        DB::table(table: 'products')->insert([
            'name' => "Srednji kurs dinara",
            'description'=>'Prosečna vrednost između kupovnog i prodajnog kursa.',
            'price'=>115.00,
            'category_id' => 1

        ]);


    }
}
