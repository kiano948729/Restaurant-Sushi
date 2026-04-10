<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'naam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'onderwerp' => 'required|string|max:255',
            'bericht' => 'required|string',
        ]);

        ContactMessage::create($data);

        return back()->with('success', 'Bedankt! Uw bericht is opgeslagen.');
    }
}