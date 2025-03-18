<?php

namespace App\Livewire;

use App\Enums\Language;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    public array $languages;

    #[Title('Dashboard')]
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mount()
    {
        $this->languages = Language::values();
    }
}
