<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    use WithFileUploads;

    #[Validate(['required','string','min:3', 'max:255'])]
    public string $name = "";

    #[Validate(['required','string','email:dns', 'unique:users'])]
    public string $email = "";

    #[Validate(['required','min:8', 'max:255'])]
    public string $password = "";

    #[Validate(['image', 'max:2048', 'mimes:jpg,png,jpeg'])]
    public string $avatar = "";

    public function createNewUser()
    {
        $validated = $this->validate();
        $validated["avatar"] = null;

        if ($this->avatar) {
            $validated["avatar"] = $this->avatar->store("avatars", "public");
        }

        User::create([
            "name"=> $this->name,
            "email"=> $this->email,
            "password"=> Hash::make($this->password),
            "avatar"=> $validated["avatar"],
        ]);

        $this->reset();

        session()->flash("success","User created successfully.");

        //? How to dispatch event for another component
        $this->dispatch("user-created");
    }

    public function render()
    {
        return view('livewire.user-register-form');
    }
}
