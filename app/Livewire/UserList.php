<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $query = "";

    public function searchUser()
    {
        $this->resetPage();
    }

    //? How to dispatch event for another component
    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        //? How to use skeleton for loading, example 1
        // return <<<'HTML'
        // <div>
        //     <svg>...</svg>
        // </div>
        // HTML;

        //? How to use skeleton for loading, example 2
        return view('livewire.placeholder.user-list');
    }

    //? How to use Computed Property
    #[Computed()]
    public function users()
    {
        return User::query()
            ->where('name', 'like', "%{$this->query}%")
            ->orWhere('email', 'like', "%{$this->query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    //? If you return view in default, you can remove 'render'
    public function render()
    {
        return view('livewire.user-list');
    }
}
