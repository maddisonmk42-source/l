<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    // Menampilkan semua pembalap
    public function index()
    {
        $drivers = Driver::latest()->get();

        return view('drivers.index', compact('drivers'));
    }

    // Form tambah pembalap
    public function create()
    {
        return view('drivers.create');
    }

    // Menyimpan pembalap baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'driver_name' => 'required|string|max:100',
            'racing_number' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'team' => 'nullable|string|max:100',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Upload foto
        $validated['photo'] = $request->file('photo')
            ->store('drivers', 'public');

        Driver::create($validated);

        return redirect()->route('drivers.index')
            ->with('success', 'Driver berhasil ditambahkan!');
    }

    // Form edit pembalap
    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    // Memperbarui data pembalap
    public function update(Request $request, Driver $driver)
    {
        $validated = $request->validate([
            'driver_name' => 'required|string|max:100',
            'racing_number' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'team' => 'nullable|string|max:100',

            // Foto wajib jika belum ada foto lama
            'photo' => ($driver->photo ? 'nullable' : 'required')
                . '|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Jika mengunggah foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto sebelumnya
            if ($driver->photo) {
                Storage::disk('public')->delete($driver->photo);
            }

            // Simpan foto baru
            $validated['photo'] = $request->file('photo')
                ->store('drivers', 'public');
        }

        $driver->update($validated);

        return redirect()->route('drivers.index')
            ->with('success', 'Data driver berhasil diperbarui!');
    }

    // Menghapus pembalap
    public function destroy(Driver $driver)
    {
        if ($driver->photo) {
            Storage::disk('public')->delete($driver->photo);
        }

        $driver->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver berhasil dihapus!');
    }
}