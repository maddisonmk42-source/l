<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Menampilkan semua mobil
    public function index()
    {
        $cars = Car::latest()->get();

        return view('cars.index', compact('cars'));
    }

    // Menampilkan formulir tambah mobil
    public function create()
    {
        return view('cars.create');
    }

    // Menyimpan mobil baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_number' => 'required|string|max:20',
            'model' => 'required|string|max:100',
            'production_year' => 'required|integer|min:1900|max:2100',
            'engine' => 'required|string|max:100',
            'team' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Mobil berhasil ditambahkan!');
    }

    // Menampilkan formulir edit mobil
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    // Memperbarui data mobil
    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'car_number' => 'required|string|max:20',
            'model' => 'required|string|max:100',
            'production_year' => 'required|integer|min:1900|max:2100',
            'engine' => 'required|string|max:100',
            'team' => 'nullable|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            if ($car->photo) {
                Storage::disk('public')->delete($car->photo);
            }

            $validated['photo'] = $request->file('photo')
                ->store('cars', 'public');
        }

        $car->update($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Data mobil berhasil diperbarui!');
    }

    // Menghapus mobil
    public function destroy(Car $car)
    {
        if ($car->photo) {
            Storage::disk('public')->delete($car->photo);
        }

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Mobil berhasil dihapus!');
    }
}