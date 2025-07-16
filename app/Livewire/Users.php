<?php

namespace App\Livewire;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $title = "Users";
        return view('livewire.users', [
            'title'=> $title,
        ]);
    }
}
