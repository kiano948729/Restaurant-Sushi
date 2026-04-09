<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dishes', 'public');
        }

        Dish::create($data);

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
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $dish = Dish::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dishes', 'public');
        }

        $dish->update($data);

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht aangepast');
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);

        if ($dish->image && Storage::disk('public')->exists($dish->image)) {
            Storage::disk('public')->delete($dish->image);
        }

        $dish->delete();

        return redirect()->route('admin.dishes.index')
            ->with('success', 'Gerecht verwijderd');
    }
}