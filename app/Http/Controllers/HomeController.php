<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Reservation;
use App\Models\Message;

class HomeController extends Controller
{
    // Landingpage / home
    public function index()
    {
        $featuredDishes = Dish::where('featured', true)->get();

        // Alleen goedgekeurde (read = true) berichten tonen
        $reviews = Message::where('read', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('featuredDishes', 'reviews'));
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'rating' => $request->rating,
            'read' => false,// moet eerst goedgekeurd worden
        ]);

        return redirect()->back()->with('success', 'Bedankt voor je review!');
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
    public function contact()
    {
        return view('contact');
    }

    // Reservering opslaan
    public function storeReservation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9+\s]+$/',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'guests' => 'required'
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