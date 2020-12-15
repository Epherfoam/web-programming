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
        // Seeding normal pizza
        DB::table('pizzas')->insert([[
            'pizzaName' => 'Bacon and Egg',
            'pizzaPhoto' => 'image/bacon_egg.jpg',
            'pizzaDetail' => 'Ordinary English Breakfast turns ito your fancy evening meal',
            'pizzaPrice' => 60000,
        ], [
            'pizzaName' => 'Blackpepper Beefer',
            'pizzaPhoto' => 'image/beef_pepper.jpg',
            'pizzaDetail' => 'BlackPepper that spikes your tongue and you know the drill',
            'pizzaPrice' => 85000,
        ], [
            'pizzaName' => 'Bufallo-Style Chicken',
            'pizzaPhoto' => 'image/bufallo_chicken.jpg',
            'pizzaDetail' => 'Classic American feast that juice up your pallate',
            'pizzaPrice' => 70000,
        ], [
            'pizzaName' => 'Cheese Sensation',
            'pizzaPhoto' => 'image/cheese.jpg',
            'pizzaDetail' => 'Cheesy World. Just kidding, it\'s full of joy!',
            'pizzaPrice' => 79000,
        ], [
            'pizzaName' => 'Garlic Chicken Super',
            'pizzaPhoto' => 'image/garlic_chicken.jpg',
            'pizzaDetail' => 'Punch up the taste-game with garlic and chicken',
            'pizzaPrice' => 77000,
        ], [
            'pizzaName' => 'Gluten-Free',
            'pizzaPhoto' => 'image/gluten_free.jpg',
            'pizzaDetail' => 'This is the one when you have that sensitive little stomach',
            'pizzaPrice' => 50000,
        ], [
            'pizzaName' => 'Hawaiian Wannabe',
            'pizzaPhoto' => 'image/hawaiian.jpg',
            'pizzaDetail' => 'Hate pinnapple? Suck! This is the one who loves tropical taste of pizza',
            'pizzaPrice' => 78000,
        ], [
            'pizzaName' => 'Italiano Original',
            'pizzaPhoto' => 'image/italian_style.jpg',
            'pizzaDetail' => 'Original authentic pizza, we\'ll miss that pisa tower',
            'pizzaPrice' => 86500,
        ], [
            'pizzaName' => 'Middle-Eastern Delicacy',
            'pizzaPhoto' => 'image/middle_eastern.jpg',
            'pizzaDetail' => 'Want that arabian delicacy flavor, well this is your choice. Pick me!',
            'pizzaPrice' => 90000,
        ], [
            'pizzaName' => 'OG Pepperoni',
            'pizzaPhoto' => 'image/pepperoni.jpg',
            'pizzaDetail' => 'What a boring dude, but we know this OG still lovely',
            'pizzaPrice' => 70000,
        ], [
            'pizzaName' => 'Supreme Special',
            'pizzaPhoto' => 'image/supreme.jpg',
            'pizzaDetail' => 'Sssh, try us, it\'s great tho 😳👌',
            'pizzaPrice' => 105000,
        ], [
            'pizzaName' => 'Tuna and Onion',
            'pizzaPhoto' => 'image/tuna_onion.jpg',
            'pizzaDetail' => 'Fishy, we never know you liked this one hehe',
            'pizzaPrice' => 99000,
        ]]);
    }
}
