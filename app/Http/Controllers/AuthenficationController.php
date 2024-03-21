<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostSignRequest;
use App\Http\Requests\PostRegisterRequest;

class AuthenficationController extends Controller
{

    //Nb: cette fonction affiche  la vue du formulaire d'inscription
    public function register()
    {
        return view('auth.register');
    }

    //Nb: cette fonction affiche  la vue du formulaire de connection
    public function sign()
    {
        return view('auth.sign');
    }

    //Nb: cette fonction trainte l'inscription a la plateforme
    public function PostRegister(PostRegisterRequest $request)
    {
        try {

            // dd($request->all());
            $validatedData = $request->validated();
            $user = new User();
            $user->nom = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->telephone = $validatedData['telephone'];
            $user->password = Hash::make($validatedData['password']);
            $user->terms = true;

            $user->save();
            notyf()->ripple(true)->addSuccess('Votre Inscription a été validé.');
            return redirect()->route('sign');
        } catch (Exception $th) {
            notyf()->ripple(true)->addError('Votre Inscription a echoué.');
            return redirect()->back();
            // dd($th->getMessage());
        }
    }

    //Nb: cette fonction trainte la connection a la plateforme
    public function PostSign(PostSignRequest $request)
    {
        $validate = $request->validated();
        if(Auth::attempt($validate))
        {
            $request->session()->regenerate();
            notyf()->ripple(true)->addSuccess('Successfully');
            return redirect()->intended(route('dashboard'));
        } else {
            notyf()->ripple(true)->addError('Le numero de telephone ou le mot de passe est incorrect.');
            return redirect()->back();
        }
    }
}
