@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Berichten</h1>
    <p class="text-gray-600">Contact berichten van klanten</p>
</div>

<div class="bg-white border-gray-200 overflow-hidden rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-700 w-8"></th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Naam</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Email</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Bericht</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Datum</th>
                    <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Actie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                    <tr class="border-b border-gray-100 {{ !$msg->read ? 'bg-blue-50/50' : '' }}">
                        <td class="py-4 px-4">
                            @if(!$msg->read)
                                <i class="lucide lucide-mail text-blue-600"></i>
                            @endif
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-900 font-medium">{{ $msg->name }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ $msg->email }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600 truncate max-w-md">{{ $msg->message }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($msg->created_at)->format('d-m-Y H:i') }}</td>
                        <td class="py-4 px-4 text-right">
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 hover:text-blue-700 hover:bg-blue-50 px-3 py-1 rounded flex items-center gap-1">
                                <i class="lucide lucide-eye"></i> Bekijk
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection