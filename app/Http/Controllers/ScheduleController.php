<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Circuit;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('circuit')
            ->latest()
            ->get();

        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $circuits = Circuit::all();

        return view('schedules.create', compact('circuits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'race_series' => 'required|string|max:100',
            'circuit_id' => 'required|exists:circuits,id',
            'race_date' => 'required|date',
            'session_type' => 'required|in:Practice,Qualifying,Race',
        ]);

        Schedule::create($request->all());

        return redirect()
            ->route('schedules.index')
            ->with('success', 'Jadwal balapan berhasil ditambahkan!');
    }

    public function edit(Schedule $schedule)
    {
        $circuits = Circuit::all();

        return view('schedules.edit', compact('schedule', 'circuits'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'race_series' => 'required|string|max:100',
            'circuit_id' => 'required|exists:circuits,id',
            'race_date' => 'required|date',
            'session_type' => 'required|in:Practice,Qualifying,Race',
        ]);

        $schedule->update($request->all());

        return redirect()
            ->route('schedules.index')
            ->with('success', 'Jadwal balapan berhasil diperbarui!');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('schedules.index')
            ->with('success', 'Jadwal balapan berhasil dihapus!');
    }
}