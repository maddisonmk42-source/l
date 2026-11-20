<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CircuitController extends Controller
{
    // Menampilkan semua circuit
    public function index()
    {
        $circuits = Circuit::latest()->get();

        return view('circuits.index', compact('circuits'));
    }

    // Menampilkan form tambah circuit
    public function create()
    {
        return view('circuits.create');
    }

    // Menyimpan circuit baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'circuit_name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'circuit_length' => 'required|numeric|min:0',
            'number_of_turns' => 'required|integer|min:1',
            'lap_record' => 'nullable|string|max:50',
            'circuit_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('circuit_image')) {
            $validated['circuit_image'] = $request->file('circuit_image')
                ->store('circuits', 'public');
        }

        Circuit::create($validated);

        return redirect()->route('circuits.index')
            ->with('success', 'Circuit berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Circuit $circuit)
    {
        return view('circuits.edit', compact('circuit'));
    }

    // Memperbarui circuit
    public function update(Request $request, Circuit $circuit)
    {
        $validated = $request->validate([
            'circuit_name' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'circuit_length' => 'required|numeric|min:0',
            'number_of_turns' => 'required|integer|min:1',
            'lap_record' => 'nullable|string|max:50',
            'circuit_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('circuit_image')) {
            if ($circuit->circuit_image) {
                Storage::disk('public')->delete($circuit->circuit_image);
            }

            $validated['circuit_image'] = $request->file('circuit_image')
                ->store('circuits', 'public');
        }

        $circuit->update($validated);

        return redirect()->route('circuits.index')
            ->with('success', 'Circuit berhasil diperbarui!');
    }

    // Menghapus circuit
    public function destroy(Circuit $circuit)
    {
        if ($circuit->circuit_image) {
            Storage::disk('public')->delete($circuit->circuit_image);
        }

        $circuit->delete();

        return redirect()->route('circuits.index')
            ->with('success', 'Circuit berhasil dihapus!');
    }
}