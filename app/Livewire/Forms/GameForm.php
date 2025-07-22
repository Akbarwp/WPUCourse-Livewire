<?php

namespace App\Livewire\Forms;

use App\Livewire\Games;
use App\Models\Game;
use Livewire\Attributes\Validate;
use Livewire\Form;

class GameForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:255'])]
    public string $name = "";

    #[Validate(['required', 'string', 'min:3', 'max:255'])]
    public string $genre = "";

    #[Validate(['required', 'string', 'min:2', 'max:255'])]
    public string $platform = "";

    public function createNewGames()
    {
        $this->validate();

        Game::create([
            "name"=> $this->name,
            "genre"=> $this->genre,
            "platform"=> $this->platform,
        ]);

        $this->reset();
    }
}
