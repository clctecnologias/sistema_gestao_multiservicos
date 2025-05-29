<?php

namespace App\Livewire\Home;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class HomeComponent extends Component
{
   
    public function render()
    {
        return view('livewire.home.home-component')->layout('layouts.home.app');
    }
}
