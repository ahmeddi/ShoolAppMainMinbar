<?php

use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
   
    $loginUserData = $request->validate([
        'username'=>'required',
        'password'=>'required'
    ]);
    $user = User::where('name',$loginUserData['username'])->first();
    if(!$user || !Hash::check($loginUserData['password'],$user->password)){
        return response()->json([
            'message' => 'Invalid Credentials'
        ],401);
    }
    $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
    return response()->json([
        'access_token' => $token,
    ]);
});

Route:: //middleware('auth:sanctum')->
get('/etuds', function (Request $request) {
    
   $etuds =  Etudiant::all();
   // return $request->user();

    return response()->json([
        'etuds' => $etuds
    ]);
});
