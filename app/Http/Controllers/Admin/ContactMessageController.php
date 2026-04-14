<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view('admin.contactMessages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        return view('admin.contactMessages.show', compact('message'));
    }

    public function update(ContactMessage $message)
    {
        $message->update([
            'is_read' => true
        ]);

        return back();
    }
}
