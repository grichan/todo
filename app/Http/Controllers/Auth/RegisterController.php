<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // store user
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Todo::create([
                'user_id' => $user->id,
                'body' => 'Add notes here.'
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'status_code' => 405,
                'message' => 'Could not register.'
            ]);
        }

        // redirect
        return response()->json([
            'status_code' => 200,
            'message' => 'Registered successfully'
        ]);
    }
}
