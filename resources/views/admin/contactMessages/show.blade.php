@extends('layouts.admin')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-500">
            ← Terug
        </a>
    </div>

    <div class="bg-white p-6 rounded shadow">

        <h1 class="text-2xl font-bold mb-2">{{ $message->onderwerp }}</h1>

        <div class="text-sm text-gray-500 mb-4">
            Van: {{ $message->naam }} ({{ $message->email }})
        </div>

        <p class="whitespace-pre-line">
            {{ $message->bericht }}
        </p>

    </div>

@endsection