<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilot;


class F1Controller extends Controller {
    public function index() {
        return view('landing', ['f1pilots' => Pilot::all()]);
    }

    public function pilot($id) {
        return view('pilot', ['pilot' => Pilot::where('id', $id)->first()]);
    }

    public function addPilot(Request $request) {
        $newPilot = new Pilot();
        $newPilot->name = $request->name;
        $newPilot->team = $request->team;
        $newPilot->age = $request->age;
        $newPilot->wins = $request->wins;
        $newPilot->save();
        return redirect('/');
    }

    public function incrementWins($id) {
        $pilot = Pilot::where('id', $id)->firstOrFail();
        $pilot->increment('wins');
        return redirect()->route('pilots', ['id' => $id]);
    }

    public function decrementWins($id) {
        $pilot = Pilot::where('id', $id)->firstOrFail();
        $pilot->decrement('wins');
        return redirect()->route('pilots', ['id' => $id]);
    }

    public function deletePilot($id) {
        $pilot = Pilot::findOrFail($id);
        $pilot->delete();
        return redirect('/');
    }






    public function header() {
        return view('blades.header');
    }

    public function populatePilotsTable() {

        $f1Pilots = [
            ['name' => 'Lewis Hamilton', 'team' => 'Mercedes', 'age' => 37, 'wins' => 100],
            ['name' => 'Max Verstappen', 'team' => 'Red Bull Racing', 'age' => 24, 'wins' => 20],
            ['name' => 'Valtteri Bottas', 'team' => 'Alfa Romeo Racing', 'age' => 32, 'wins' => 9],
            ['name' => 'Sergio Perez', 'team' => 'Red Bull Racing', 'age' => 31, 'wins' => 2],
            ['name' => 'Lando Norris', 'team' => 'McLaren', 'age' => 22, 'wins' => 1],
            ['name' => 'Charles Leclerc', 'team' => 'Ferrari', 'age' => 24, 'wins' => 2],
            ['name' => 'Carlos Sainz', 'team' => 'Ferrari', 'age' => 27, 'wins' => 0],
            ['name' => 'Daniel Ricciardo', 'team' => 'McLaren', 'age' => 32, 'wins' => 8],
            ['name' => 'Pierre Gasly', 'team' => 'AlphaTauri', 'age' => 26, 'wins' => 1],
            ['name' => 'Fernando Alonso', 'team' => 'Alpine', 'age' => 40, 'wins' => 32],
            ['name' => 'Esteban Ocon', 'team' => 'Alpine', 'age' => 25, 'wins' => 1],
            ['name' => 'Sebastian Vettel', 'team' => 'Aston Martin', 'age' => 34, 'wins' => 53],
            ['name' => 'Lance Stroll', 'team' => 'Aston Martin', 'age' => 23, 'wins' => 0],
            ['name' => 'Nicholas Latifi', 'team' => 'Williams', 'age' => 26, 'wins' => 0],
            ['name' => 'George Russell', 'team' => 'Williams', 'age' => 24, 'wins' => 0],
            ['name' => 'Kimi Räikkönen', 'team' => 'Alfa Romeo Racing', 'age' => 42, 'wins' => 21],
            ['name' => 'Antonio Giovinazzi', 'team' => 'Alfa Romeo Racing', 'age' => 28, 'wins' => 0],
            ['name' => 'Mick Schumacher', 'team' => 'Haas', 'age' => 23, 'wins' => 0],
            ['name' => 'Nico Hulkenberg', 'team' => 'Haas', 'age' => 23, 'wins' => 0],
            ['name' => 'Yuki Tsunoda', 'team' => 'AlphaTauri', 'age' => 21, 'wins' => 0],
        ];

        foreach ($f1Pilots as $pilotData) {
            $pilot = new Pilot();
            $pilot->name = $pilotData['name'];
            $pilot->team = $pilotData['team'];
            $pilot->age = $pilotData['age'];
            $pilot->wins = $pilotData['wins'];
            $pilot->save();
        }
        return redirect('/');
    }
}