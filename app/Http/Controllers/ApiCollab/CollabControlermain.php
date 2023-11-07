<?php

namespace App\Http\Controllers\ApiCollab;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collaborator;
use Illuminate\Support\Facades\Auth;

class CollabControlermain extends Controller
{
    public function index()
    {
        $collaborators = Collaborator::all();
        return response()->json(['collaborators' => $collaborators]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            'position'=> 'required'
        ]);

        $collaborators = Collaborator::create([
            'name' => $request->name,
            'email' => $request->email,
            'position'=> $request->position,
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
    
        $collaborators = Collaborator::where('name', $credentials['name'])->first();
    
        if (!$collaborators) {
            return response()->json(['message' => 'Usuário não encontrado'], 401);
        }
            if (Auth::guard('collaborators')->attempt($credentials)) {
                return response()->json(['message' => 'Login bem-sucedido']);
            } else {
                return response()->json(['message' => 'Erro ao autenticar'], 401);
            }
    }

}
