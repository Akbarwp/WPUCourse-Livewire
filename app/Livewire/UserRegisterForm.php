<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    //? How to Uploading file form
    use WithFileUploads;

    //? How to make data binding
    //? How to validate form input, example 2
    #[Validate(['required','string','min:3', 'max:255'])]
    public string $name = "";

    #[Validate(['required','string','email:dns', 'unique:users'])]
    public string $email = "";

    #[Validate(['required','min:8', 'max:255'])]
    public string $password = "";

    #[Validate(['image', 'max:2048', 'mimes:jpg,png,jpeg'])]
    public string $avatar = "";

    //? How to make actions
    public function createNewUser()
    {
        //? How to validation data, example 1
        // $validated = $this->validate([
        //     'name' => ['required','string','min:3', 'max:255'],
        //     'email' => ['required','string','email:dns', 'unique:users'],
        //     'password' => ['required','min:8', 'max:255'],
        // ]);
        // User::create([
        //     "name"=> $validated['name'],
        //     "email"=> $validated['email'],
        //     "password"=> Hash::make($validated['password']),
        // ]);

        $validated = $this->validate();

        if ($this->avatar) {
            $validated["avatar"] = $this->avatar->store("avatars", "public");
        }

        User::create([
            "name"=> $this->name,
            "email"=> $this->email,
            "password"=> Hash::make($this->password),
            "avatar"=> $validated["avatar"],
        ]);

        //? Reset input field, or spesific field
        $this->reset();
        // $this->reset(['name', 'email', 'password']);

        //? How to sending flash message
        session()->flash("success","User created successfully.");

        //? How to dispatch event for another component
        $this->dispatch("user-created");
    }

    public function render()
    {
        return view('livewire.user-register-form');
    }
}
