<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'founded_year' => 'nullable|integer|min:1900|max:2100',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['logo'] = $request->file('logo')->store('teams', 'public');

        Team::create($validated);

        return redirect()->route('teams.index')
            ->with('success', 'Team successfully added!');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'team_name' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'founded_year' => 'nullable|integer|min:1900|max:2100',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($team->logo) {
                Storage::disk('public')->delete($team->logo);
            }

            $validated['logo'] = $request->file('logo')->store('teams', 'public');
        }

        $team->update($validated);

        return redirect()->route('teams.index')
            ->with('success', 'Team successfully updated!');
    }

    public function destroy(Team $team)
    {
        if ($team->logo) {
            Storage::disk('public')->delete($team->logo);
        }

        $team->delete();

        return redirect()->route('teams.index')
            ->with('success', 'Team successfully deleted!');
    }
}