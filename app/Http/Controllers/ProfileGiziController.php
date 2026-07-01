<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;

class ProfileGiziController extends Controller
{
    /**
     * Menampilkan profil gizi.
     */
    public function index()
    {
        $profile = UserProfile::where('user_id', Auth::id())->first();

        return view('profile-gizi.create', compact('profile'));
    }

    /**
     * Menampilkan form profil gizi.
     */
    public function create()
    {
        $profile = UserProfile::where('user_id', Auth::id())->first();

        return view('profile-gizi.create', compact('profile'));
    }

    /**
     * Menyimpan atau memperbarui profil gizi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:10|max:19',

            // UBAH BAGIAN INI
            'gender' => 'required|in:laki-laki,perempuan',

            'weight' => 'required|numeric|min:10|max:300',

            'height' => 'required|numeric|min:50|max:250',

            'activity_level' => 'required|in:sedentary,light,moderate,active,very_active',
        ]);

        UserProfile::updateOrCreate(
            [
                'user_id' => Auth::id(),
            ],
            [
                'age' => $request->age,
                'gender' => $request->gender,
                'weight' => $request->weight,
                'height' => $request->height,
                'activity_level' => $request->activity_level,
            ]
        );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Profil gizi berhasil disimpan.');
    }
}