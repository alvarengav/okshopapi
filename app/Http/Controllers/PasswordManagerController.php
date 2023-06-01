<?php

namespace App\Http\Controllers;

use App\Models\PasswordManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PasswordManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PasswordManager::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newPasswordManager = $request->all();
        $newPasswordManager['user_id'] = Auth::id();
        $newPasswordManager['password'] = Crypt::encryptString($request->password);

        PasswordManager::create($newPasswordManager);
        return $newPasswordManager;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $passwordManager = PasswordManager::findOrFail($id);
        return response()->json($passwordManager);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $passwordManager = PasswordManager::findOrFail($id);
        $passwordManager->update($request->all());
        return response()->json($passwordManager);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $passwordManager = PasswordManager::findOrFail($id);
        $passwordManager->delete();
        return response()->json(null, 204);
    }
}
