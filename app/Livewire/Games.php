<?php

namespace App\Livewire;

use App\Livewire\Forms\GameForm;
use App\Models\Game;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Games extends Component
{
    use WithPagination;

    //? How to use Form Object
    public GameForm $form;

    public $query = "";

    public function searchGames()
    {
        $this->resetPage();
    }

    #[On('games-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function createNewGames()
    {
        $this->form->createNewGames();

        session()->flash("success","Games created successfully.");

        $this->dispatch("games-created");
    }

    #[Computed()]
    public function games()
    {
        return Game::query()
            ->where('name', 'like', "%{$this->query}%")
            ->orWhere('genre', 'like', "%{$this->query}%")
            ->orWhere('platform', 'like', "%{$this->query}%")
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.games');
    }
}
