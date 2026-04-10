<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\TextPart;
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

        Mail::raw($data['bericht'], function ($message) use ($data) {
            $message->to('stoelpootappelsap@gmail.com')
                ->subject($data['onderwerp'])
                ->from($data['email'], $data['naam']);
        });

        return back()->with('success', 'Bedankt! Uw bericht is verzonden.');
    }
}