<?php

use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;
use Illuminate\Database\Seeder;

class orderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10)->create()->each(function($o){
            for($i=0; $i<=2; $i++){
                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id' => rand(1,5),
                    'price' => 50,
                    'qtd' =>2
                ]));
            }
        });
    }
}
