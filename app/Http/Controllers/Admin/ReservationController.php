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
        return view('admin.reservations.index', compact('reservations'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $statusMap = [
            'Geaccepteerd' => 'accepted',
            'Geweigerd' => 'rejected',
            'In behandeling' => 'pending',
        ];

        $status = $statusMap[$request->status] ?? $request->status;

        $reservation->update(['status' => $status]);

        return redirect()->route('admin.reservations.index');
    }
}