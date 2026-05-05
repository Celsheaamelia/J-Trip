<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailUser;


class UserController extends Controller
{
    private function generateUserId()
    {
        $last = User::orderBy('id_user', 'desc')->first();

        if (!$last) {
            return 'USR001';
        }

        $num = (int) substr($last->id_user, 3) + 1;

        return 'USR' . str_pad($num, 3, '0', STR_PAD_LEFT);
    }

        public function index(Request $request)
        {
            $query = User::query();

            if ($request->role) {
                $query->where('role', $request->role);
            }

            $users = $query->orderBy('created_at', 'desc')->get();

            return view('admin.user.index', compact('users'));
        }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'no_telp' => 'required',
            'role' => 'required'
        ]);

        User::create([
            'id_user' => $this->generateUserId(),
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'aktif'
        ]);

        return redirect('/admin/user')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
{
    $user = User::where('id_user', $id)->firstOrFail();

    return view('admin.user.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::where('id_user', $id)->firstOrFail();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:user,email,' . $user->id_user . ',id_user',
        'no_telp' => 'required',
        'role' => 'required',
        'status' => 'required',
        'password' => 'nullable|min:6',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
        'role' => $request->role,
        'status' => $request->status,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect('/admin/user')->with('success', 'User berhasil diupdate');
}

    public function destroy($id)
    {
        DetailUser::where('id_user', $id)->delete();

        $user = User::where('id_user', $id)->firstOrFail();
        $user->delete();

        return redirect('/admin/user')->with('success', 'User berhasil dihapus');
    }
}
