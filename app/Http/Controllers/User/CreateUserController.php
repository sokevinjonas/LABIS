<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\CreateUserRequest;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request)
    {   
        try {
            // dd($request->all());
        $validate = $request->validated();

        $user = new User();
        $user->nom =  $validate['nom'];
        $user->telephone =  $validate['telephone'];
        $user->email =  $validate['email'];
        $user->role =  $validate['role'];
        $user->password = Hash::make($validate['password']);
        $user->terms =  true;
        
        $user->save();
        notyf()->ripple(true)->addSuccess('Un jeune labis a été ajouté avec success.');
        return redirect()->back();

        } catch (Exception $th) {
        //dd($th->getMessage());
        notyf()->ripple(true)->addError('Opération echouer');
        return redirect()->back();
        }
    }
}