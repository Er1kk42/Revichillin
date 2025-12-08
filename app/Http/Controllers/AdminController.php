<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show users administration page. Only admin role allowed.
     */
    public function users()
    {
        // ensure admin
        $current = auth()->user();
        if (!$current || ($current->role ?? null) !== 'admin') {
            abort(403);
        }

        $users = User::orderBy('created_at', 'desc')->paginate(15);

        return view('pouzivatelia', compact('users'));
    }

    /**
     * Update a user's role (admin only).
     */
    public function updateRole(Request $request, $id)
    {
        $current = auth()->user();
        if (!$current || ($current->role ?? null) !== 'admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        if ($user->id === $current->id) {
            return redirect()->back()->withErrors(['msg' => 'Nemôžete zmeniť svoju vlastnú rolu.']);
        }

        $data = $request->validate([
            'role' => ['required', 'in:user,admin'],
        ]);

        // prevent removing last admin
        if ($user->role === 'admin' && $data['role'] !== 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return redirect()->back()->withErrors(['msg' => 'Musí existovať aspoň jeden admin.']);
            }
        }

        $user->role = $data['role'];
        $user->save();

        return redirect()->back()->with('status', 'Rola používateľa bola zmenená.');
    }

    /**
     * Delete a user (admin only).
     */
    public function destroy($id)
    {
        $current = auth()->user();
        if (!$current || ($current->role ?? null) !== 'admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        if ($user->id === $current->id) {
            return redirect()->back()->withErrors(['msg' => 'Nemôžete vymazať seba.']);
        }

        // prevent deleting last admin
        if ($user->role === 'admin') {
            $adminCount = User::where('role', 'admin')->count();
            if ($adminCount <= 1) {
                return redirect()->back()->withErrors(['msg' => 'Musí existovať aspoň jeden admin.']);
            }
        }

        $user->delete();

        return redirect()->back()->with('status', 'Používateľ bol vymazaný.');
    }
}
