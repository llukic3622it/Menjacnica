<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user')->paginate(10);
        return view('korisnici.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::doesntHave('profile')->get(); // Samo korisnici bez profila
        return view('korisnici.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|unique:profiles,user_id',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'job_title' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100'
        ]);

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        Profile::create($validated);

        return redirect()->route('korisnici.index')
            ->with('success', 'Korisnički profil je uspešno kreiran.');
    }

    public function show(Profile $profile)
    {
        return view('korisnici.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        return view('korisnici.edit', compact('profile', 'users'));
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|unique:profiles,user_id,'.$profile->id,
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'job_title' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100'
        ]);

        if ($request->hasFile('profile_picture')) {
            // Obriši staru sliku ako postoji
            if ($profile->profile_picture) {
                Storage::disk('public')->delete($profile->profile_picture);
            }
            
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        $profile->update($validated);

        return redirect()->route('korisnici.index')
            ->with('success', 'Korisnički profil je uspešno ažuriran.');
    }

    public function destroy(Profile $profile)
    {
        // Obriši sliku ako postoji
        if ($profile->profile_picture) {
            Storage::disk('public')->delete($profile->profile_picture);
        }
        
        $profile->delete();
        
        return redirect()->route('korisnici.index')
            ->with('success', 'Korisnički profil je uspešno obrisan.');
    }
}