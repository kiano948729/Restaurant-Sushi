<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.messages', compact('messages'));
    }

    public function markRead($id)
    {
        $message = Message::findOrFail($id);

        $message->update([
            'read' => true
        ]);

        return redirect()->route('admin.messages.index');
    }
}