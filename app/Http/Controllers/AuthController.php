<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Метод для логина и получения токена
    public function login(Request $request){
        // Валидируем входящие данные
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ищем пользователя по email
        $user = User::where('email', $fields['email'])->first();

        // Проверяем, существует ли пользователь
        if (! $user) {
            return response(['message' => 'Wrong email'], 401);
        }

        // Проверяем пароль
        if (! Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Wrong password'], 401);
        }

        // Создаём токен
        $token = $user->createToken('MyAppToken')->plainTextToken;

        // Формируем ответ
        $response = [
            'user' => $user,
            'token' => $token
        ];

        // Возвращаем ответ с кодом 201
        return response($response, 201);
    }
    public function logout(Request $request)
    {
        // Удаляем текущий токен пользователя
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }
}
