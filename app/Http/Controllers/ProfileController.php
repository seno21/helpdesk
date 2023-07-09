<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'title' => 'Profiel Editor'
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:App\Models\User,name|regex:/^\S*$/',
        ]);

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
        return redirect()->back()->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function editKaryawan()
    {
        $karyawan = new Karyawan();

        $data = [
            'title' => 'Update Profile Karyawan',
            'karyawan' => $karyawan->profileKaryawan(Auth::user()->id)
        ];

        return view('profile.editKaryawan', $data);
    }

    public function updateKaryawan(Request $request, $id)
    {
        // dd($request->password);
        // Validasi
        $request->validate([
            'nama' => 'required',
            'nik'  => 'required|numeric',
            'tlp' => 'required|numeric'
        ]);


        $karyawan = Karyawan::find($id);


        $karyawan->nama = $request->nama;
        $karyawan->nik = $request->nik;
        $karyawan->tgl_lahir = $request->tgl;
        $karyawan->kelamin = $request->kelamin;
        $karyawan->telepon = '+62-' . $request->tlp;
        $karyawan->alamat = $request->alamat;
        $karyawan->save();

        return redirect()->route('dashboard')->with('success', 'Profile Berhasil Diupdate');
    }
}
