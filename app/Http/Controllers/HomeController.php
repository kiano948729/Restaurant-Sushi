<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Reservation;

class HomeController extends Controller
{
    // Landingpage / home
    public function index()
    {
        $featuredDishes = Dish::where('featured', true)->get();

        // Reviews hardcoded, dit doe ik later ff uit de db had hier ff geen zin in 
        $reviews = [
            [
                'name' => 'Sarah de Vries',
                'rating' => 5,
                'text' => 'De beste sushi van Amsterdam! Superverse ingrediënten en uitstekende service.',
            ],
            [
                'name' => 'Michael Chen',
                'rating' => 5,
                'text' => 'Authentieke Japanse smaken. De chef weet echt wat hij doet. Aanrader!',
            ],
            [
                'name' => 'Lisa Bakker',
                'rating' => 5,
                'text' => 'Prachtige ambiance en heerlijk eten. Perfect voor een speciale avond.',
            ],
        ];

        return view('home', compact('featuredDishes', 'reviews'));
    }

    // Menu pagina
    public function menu()
    {
        $dishes = Dish::all();
        return view('menu', compact('dishes'));
    }

    // Reserveren pagina
    public function reserveren()
    {
        return view('reserveren');
    }

    // Over ons pagina
    public function overOns()
    {
        return view('over-ons');
    }

    // Reservering opslaan
    public function storeReservation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'date' => 'required|date',
            'time' => 'required',
            'guests' => 'required|integer|min:1',
        ]);

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'guests' => $request->guests,
            'status' => 'pending',
        ]);

        return redirect()->route('reserveren')->with('success', 'Uw reservering is succesvol geplaatst!');
    }
}