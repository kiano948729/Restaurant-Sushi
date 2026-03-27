<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class CartController extends Controller
{
    public function add(Request $request, Dish $dish)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$dish->id])) {
            $cart[$dish->id]['quantity']++;
        } else {
            $cart[$dish->id] = [
                "name" => $dish->name,
                "quantity" => 1,
                "price" => $dish->price,
                "image" => $dish->image,
                "description" => $dish->description
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $dish->name.' is toegevoegd aan je winkelwagen!');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function remove(Dish $dish)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$dish->id])) {
            unset($cart[$dish->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', $dish->name.' is verwijderd uit je winkelwagen.');
    }

    public function update(Request $request, Dish $dish)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$dish->id])) {
            $cart[$dish->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Aantal aangepast.');
    }
}