<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::latest()->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    public function create()
    {
        return view('admin.dishes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        Dish::create($request->all());

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht toegevoegd');
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        return view('admin.dishes.edit', compact('dish'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $dish = Dish::findOrFail($id);
        $dish->update($request->all());

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht aangepast');
    }

    public function destroy($id)
    {
        Dish::destroy($id);

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht verwijderd');
    }
}