<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request)
    {
        if (!Auth::attempt($this->credentials($request))) {
            return response()->json([
                "error" => 'Invalid username or password'
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            "access_token" => $user->createToken('AccessToken')->plainTextToken,
            'token_type' => 'Bearer',
            "user" => $user
        ], 200);
    }

    private function credentials(LoginRequest $request): array
    {
        $form = $request->validated();

        $credentials = [
            "password" => $form['password'],
            "phone" => $form['username']
        ];

        if (filter_var($form['username'], FILTER_VALIDATE_EMAIL)) {
            unset($credentials['phone']);
            $credentials["email"] = $form['username'];
        }
        return $credentials;
    }
}
