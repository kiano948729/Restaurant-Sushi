<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();

        return view('admin.reservations', compact('reservations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.reservations.index');
    }
}