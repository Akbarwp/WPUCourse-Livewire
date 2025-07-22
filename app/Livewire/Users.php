<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

//? How to use custom layout
#[Layout("components.layouts.app")]
//? How to custom title tab
#[Title("Users")]
class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }
}
