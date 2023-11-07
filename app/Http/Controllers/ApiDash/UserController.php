<?php

namespace App\Http\Controllers\ApiDash;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
    ]);
    }

    public function login(Request $request)
{
    $request->validate([
        'name' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('name', 'password');

    $user = User::where('name', $credentials['name'])->first();

    if (!$user) {
        return response()->json(['message' => 'Usuário não encontrado'], 401);
    }
    
    if (Hash::check($credentials['password'], $user->password)) {
        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Login bem-sucedido']);
        } else {
            return response()->json(['message' => 'Erro ao autenticar'], 401);
        }
    } else {
        return response()->json(['message' => 'password incorreta'], 401);
    }
}
}
