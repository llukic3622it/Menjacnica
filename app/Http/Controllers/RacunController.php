<?php

namespace App\Http\Controllers;

use App\Models\Racun;
use App\Models\User;
use Illuminate\Http\Request;

class RacunController extends Controller
{
    public function index()
    {
        
        $racuni = Racun::with('user')->get();
        return view('racuni.index', compact('racuni'));
    }

    

    public function create()
    {
        $users = User::all(); // da bi mogao da biraš korisnika
        return view('racuni.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'broj_racuna' => 'required|string|max:20',
            'iznos_uplate' => 'required|numeric',
        ]);

        Racun::create($request->all());

        return redirect()->route('racuni.index')->with('success', 'Račun uspešno dodat.');
    }

    public function edit($id)
    {
        $racun = Racun::findOrFail($id);
        $users = User::all();
        return view('racuni.edit', compact('racun', 'users'));
    }

    public function update(Request $request, $id)
    {
        $racun = Racun::findOrFail($id);

        $racun->user_id = $request->input('user_id');
        $racun->broj_racuna = $request->input('broj_racuna');
        $racun->iznos_uplate = $request->input('iznos_uplate');

        $racun->save();

        return redirect()->route('racuni.index')->with('success', 'Uspešno izmenjen račun.');
    }

    public function destroy($id)
    {
        $racun = Racun::findOrFail($id);
        $racun->delete();

        return redirect()->route('racuni.index')->with('success', 'Račun je uspešno obrisan.');
    }

    

    
}
