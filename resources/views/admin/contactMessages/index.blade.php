@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Berichten</h1>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-600 text-sm">
                <tr>
                    <th class="p-4">Naam</th>
                    <th>Email</th>
                    <th>Onderwerp</th>
                    <th>Status</th>
                    <th class="text-right p-4">Actie</th>
                </tr>
            </thead>

            <tbody>
                @foreach($messages as $message)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-4">{{ $message->naam }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->onderwerp }}</td>

                        <td>
                            @if($message->is_read)
                                <span class="text-green-600 text-sm">Gelezen</span>
                            @else
                                <span class="text-red-500 text-sm font-semibold">Nieuw</span>
                            @endif
                        </td>

                        <td class="text-right p-4 flex justify-end gap-2">

                            <a href="{{ route('admin.contact-messages.show', $message) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded text-sm">
                                Bekijken
                            </a>

                            @if(!$message->is_read)
                                <form method="POST" action="{{ route('admin.contact-messages.read', $message) }}">
                                    @csrf
                                    <button class="px-3 py-1 bg-green-500 text-white rounded text-sm">
                                        Mark as read
                                    </button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection