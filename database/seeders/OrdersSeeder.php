<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Dish;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dishes = Dish::all();

        $ordersData = [
            ['customer_name' => 'Jan Jansen', 'customer_email' => 'jan@email.nl', 'customer_phone' => '+31612345678', 'total' => 17.00, 'status' => 'pending'],
            ['customer_name' => 'Sarah de Vries', 'customer_email' => 'sarah@email.nl', 'customer_phone' => '+31698765432', 'total' => 29.50, 'status' => 'preparing'],
        ];

        foreach ($ordersData as $orderData) {
            $order = Order::create($orderData);

            $order->items()->createMany([
                ['dish_id' => $dishes->random()->id, 'quantity' => 2, 'price' => 6.50],
                ['dish_id' => $dishes->random()->id, 'quantity' => 1, 'price' => 4.00],
            ]);
        }
    }
}
