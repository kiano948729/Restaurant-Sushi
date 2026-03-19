<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $dishesCount = Dish::count();
        $ordersCount = Order::count();
        $reservationsCount = Reservation::count();
        $messagesCount = Message::count();

        $recentOrders = Order::with('items.dish')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'dishesCount',
            'ordersCount',
            'reservationsCount',
            'messagesCount',
            'recentOrders'
        ));
    }
}