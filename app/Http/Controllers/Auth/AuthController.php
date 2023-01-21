<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthStoreRequest as StoreRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(StoreRequest $request)
    {
        $date = Carbon::now();
        $deletedAccount = Carbon::now();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->next_expiration = $date->addDays(7);
        $user->deleted_account = $deletedAccount->addDays(15);
        $user->save();

        if (!$user->id) {
            return response()->json(['error' => 'Erro ao cadastrar usuário.'], 400);
        }

        return response()->json(['access_token' => $user->createToken('auth-api')->accessToken], 200);
    }
}
