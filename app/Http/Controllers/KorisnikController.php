<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class KorisnikController extends Controller
{
    public function index()
    {
        $profiles = UserProfile::all();
        return view('korisnici.index', compact('profiles'));
    }

    public function destroy($id)
    {
        $profile = UserProfile::findOrFail($id);
        $profile->delete();

        return redirect()->route('korisnici.index')->with('success', 'Korisnički profil je uspešno obrisan.');
    }

    public function edit($id)
    {
        $profile = UserProfile::findOrFail($id);
        return view('korisnici.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = UserProfile::findOrFail($id);

        $profile->update([
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'bio' => $request->bio,
        ]);

        return redirect()->route('korisnici.index')->with('success', 'Profil je uspešno ažuriran.');
    }

    public function create()
    {
        return view('korisnici.create');
    }

    public function store(Request $request)
    {
        // Validacija unetih podataka
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'bio' => 'required|string',
        ]);

        // Kreiranje novog profila
        UserProfile::create($validated);

        // Preusmeravanje nazad sa porukom uspeha
        return redirect()->route('korisnici.index')->with('success', 'Profil je uspešno dodat.');
    }
}
