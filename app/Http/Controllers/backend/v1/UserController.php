<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('backend.v1.pages.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('user.index');
        }
        return view('backend.v1.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('user.index');
        }
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect()->route('user.index')->with('toast_success', 'Pengguna Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('user.index');
        }
        $data['user'] = $user;
        return view('backend.v1.pages.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('user.index');
        }
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required'
        ]);

        $data = $request->all();
        $user->update($data);

        return redirect()->route('user.index')->with('toast_success', 'Pengguna Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->role !== 'Admin') {
            return redirect()->route('user.index');
        }
        $user->delete();
        return redirect()->back()->with('toast_success', 'Pengguna Berhasil di Hapus');
    }
}
