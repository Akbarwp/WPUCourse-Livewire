<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    //? How to Uploading file; Pagination
    use WithFileUploads, WithPagination;

    public $query = "";

    //? How to make data binding
    public $title = "Users Page";

    //? How to validate form input, example 2
    #[Validate(['required','string','min:3', 'max:255'])]
    public $name = "";

    #[Validate(['required','string','email:dns', 'unique:users'])]
    public $email = "";

    #[Validate(['required','min:8', 'max:255'])]
    public $password = "";

    #[Validate(['image', 'max:2048', 'mimes:jpg,png,jpeg'])]
    public $avatar = "";

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

        $this->dispatch("user-created");
    }

    //? How to make searching feature
    public function searchUser()
    {
        $this->resetPage();
    }

    //? For searching in different page and using 'wire:model.live', and specific model for 'query'
    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users', [
            'title'=> $this->title,
            'users'=> User::query()
                ->where('name', 'like', "%{$this->query}%")
                ->orWhere('email', 'like', "%{$this->query}%")
                ->orderBy('created_at', 'desc')
                ->paginate(5),
        ]);
    }
}
