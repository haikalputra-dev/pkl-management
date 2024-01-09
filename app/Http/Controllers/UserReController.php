<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;

class UserReController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.admin_data_master', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama       = $request->input('nama');
        $email      = $request->input('email');
        $username   = $request->input('username');
        $password   = $request->input('password');
        $role       = $request->input('role');
        User::create([
            'name'      => $nama,
            'username'  => $username,
            'email'     => $email,
            'password'  => $password,
            'role'      => $role,
            'status'    => 'inaktif' 
        ]);
        Alert::success('Success!',"User Berhasil Dibuat!");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name             = $request->input('nama');
        $user->email            = $request->input('email');
        $user->status           = $request->input('status_aktif');
        $user->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }

    public function destroyUser($id)
    {
        User::destroy($id);
        Alert::success('Success!',"User Berhasil Dihapus!");
        return back();
    }
}
