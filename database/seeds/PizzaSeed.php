<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizza')->insert([[
            'pizzaName' => 'Bacon and egg',
            'pizzaPhoto' => 'bacon_egg.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 60000,
        ],[
            'pizzaName' => 'Blackpepper Beef with Veggies',
            'pizzaPhoto' => 'beef_pepper.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 85000,
        ],[
            'pizzaName' => 'Bufallo-Style Chicken',
            'pizzaPhoto' => 'bufallo_chicken.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 70000,
        ],[
            'pizzaName' => 'Cheese Sensation',
            'pizzaPhoto' => 'cheese.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 79000,
        ],[
            'pizzaName' => 'Garlic Chicken Super',
            'pizzaPhoto' => 'garlic_chicken.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 77000,
        ], [
            'pizzaName' => 'Gluten-Free',
            'pizzaPhoto' => 'gluten_free.jpg',
            'pizzaDetail' => 'enter description here',
            'pizzaPrice' => 50000,
        ],[
            'pizzaName' => 'Hawaiian Wannabe',
            'pizzaPhoto' => 'hawaiian.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 78000,
        ],[
            'pizzaName' => 'Italiano Original',
            'pizzaPhoto' => 'italian-style.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 86500,
        ],[
            'pizzaName' => 'Middle-Eastern Delicacy',
            'pizzaPhoto' => 'middle-eastern.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 90000,
        ],[
            'pizzaName' => 'OG Pepperoni',
            'pizzaPhoto' => 'pepperoni.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 70000,
        ],[
            'pizzaName' => 'Supreme Special',
            'pizzaPhoto' => 'supreme.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 105000,
        ],[
            'pizzaName' => 'Tuna and Onion',
            'pizzaPhoto' => 'tuna_onion.jpg',
            'pizzaDetail' => 'enter desctiption here',
            'pizzaPrice' => 99000,
        ]]);



        // $table->string('pizzaName');
        // $table->string('pizzaPhoto');
        // $table->text('pizzaDetail');
        // $table->integer('pizzaPrice');
    }
}
