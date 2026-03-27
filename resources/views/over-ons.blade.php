@extends('layouts.app')

@section('content')
<div class="min-h-screen py-16">

    <!-- Header -->
    <div class="text-center mb-16 px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
            Over Ons
        </h1>
        <p class="text-white/60 max-w-2xl mx-auto">
            Ontdek het verhaal achter Sushi Goya en de passie die wij dagelijks in onze gerechten stoppen.
        </p>
    </div>

    <!-- Story -->
    <div class="max-w-5xl mx-auto px-4 mb-20">
        <div class="bg-[#1a1a1a] border border-white/10 rounded-2xl p-8 md:p-12">
            <h2 class="text-2xl font-semibold text-white mb-6">
                Ons Verhaal
            </h2>
            <p class="text-white/70 leading-relaxed mb-4">
                Sushi Goya begon als een kleine droom van een groep gepassioneerde chefs die de 
                authentieke smaken van Japan naar Nederland wilden brengen. Met jarenlange ervaring 
                in traditionele Japanse keukens, combineren wij vakmanschap met moderne invloeden.
            </p>
            <p class="text-white/70 leading-relaxed mb-4">
                Wij geloven dat sushi meer is dan alleen eten — het is een kunstvorm. Elk gerecht 
                wordt met precisie en zorg bereid, waarbij alleen de meest verse ingrediënten worden gebruikt.
            </p>
            <p class="text-white/70 leading-relaxed">
                Of je nu komt voor een snelle maaltijd of een uitgebreide avond uit, bij ons staat 
                kwaliteit en beleving altijd centraal.
            </p>
        </div>
    </div>

    <!-- Chefs -->
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12">
            Onze Chefs
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Chef 1 -->
            <div class="bg-[#1a1a1a] border border-white/10 rounded-xl overflow-hidden group">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/chefs/chef1.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5 text-center">
                    <h3 class="text-white font-semibold text-lg">Chef Hiroshi</h3>
                    <p class="text-[#F5A623] text-sm">Head Sushi Chef</p>
                    <p class="text-white/60 text-sm mt-2">
                        Specialist in traditionele sushi technieken.
                    </p>
                </div>
            </div>

            <!-- Chef 2 -->
            <div class="bg-[#1a1a1a] border border-white/10 rounded-xl overflow-hidden group">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/chefs/chef2.jpg') }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5 text-center">
                    <h3 class="text-white font-semibold text-lg">Chef Aiko</h3>
                    <p class="text-[#F5A623] text-sm">Sashimi Expert</p>
                    <p class="text-white/60 text-sm mt-2">
                        Bekend om haar precisie en presentatie.
                    </p>
                </div>
            </div>

            <!-- Chef 3 -->
            <div class="bg-[#1a1a1a] border border-white/10 rounded-xl overflow-hidden group">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/chefs/chef3.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5 text-center">
                    <h3 class="text-white font-semibold text-lg">Chef Kenji</h3>
                    <p class="text-[#F5A623] text-sm">Hot Kitchen</p>
                    <p class="text-white/60 text-sm mt-2">
                        Meester in warme Japanse gerechten.
                    </p>
                </div>
            </div>

            <!-- Chef 4 -->
            <div class="bg-[#1a1a1a] border border-white/10 rounded-xl overflow-hidden group">
                <div class="h-64 overflow-hidden">
                    <img src="{{ asset('images/chefs/chef4.jpg') }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-5 text-center">
                    <h3 class="text-white font-semibold text-lg">Chef Yumi</h3>
                    <p class="text-[#F5A623] text-sm">Dessert & Fusion</p>
                    <p class="text-white/60 text-sm mt-2">
                        Brengt creatieve twists in elk gerecht.
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection