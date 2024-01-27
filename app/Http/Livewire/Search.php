<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        Log::info($this->search);
        Log::info('132132');

        return view('livewire.search', [
            'users' => User::where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function handleClick()
    {
        $this->search = "Hu";

        Log::info('Click here');
    }
}
