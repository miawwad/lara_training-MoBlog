<?php

namespace App\Http\Controllers;
use App\Models\User;


class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        //create the user
        // if sent back to the register form, it means validation failed. (which it did)
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'username'=>'required|max:255|min:3|unique:users,username',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:7|max:255'
        ]);

        User::create($attributes); // if validate is successful create the user using the inputted info.
        
        return redirect('/');
    }
}
