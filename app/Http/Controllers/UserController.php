<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('dashboard', compact('user'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('berhasil', "Anda berhasil logout");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.data-user', compact('users'));
    }
    

    public function buat(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);
        
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => $request->role
        ]);

        return redirect("/data-user")->with("success", "Berhasil membuat account baru");
    }

    public function user()
    {
        $users = User::all();
        return view('admin.create', compact('users'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'email harus diisi!',
            'password.required' => 'password harus diisi!',
        ]);

        //  $user = $request->only('email', 'password'); 
        $user = [
            "email" => $request->email, 
            "password" => $request->password
        ];

        if (Auth::attempt($user)) {
            return redirect('/dashboard')->with("success", "Anda berhasil login");
        } else {
            return redirect('/')->with('error', "Gagal login, periksa dan coba lagi!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => $request->role
        ]);

        return redirect('/data-user')->with('sukses', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return back()->with("mantap", "Berhasil menghapus akun");
    }
}
