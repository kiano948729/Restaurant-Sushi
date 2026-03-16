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

        return view('admin.dishes', compact('dishes'));
    }

    public function store(Request $request)
    {
        Dish::create($request->all());

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht toegevoegd');
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);
        $dish->update($request->all());

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht bijgewerkt');
    }

    public function destroy($id)
    {
        Dish::destroy($id);

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht verwijderd');
    }
}