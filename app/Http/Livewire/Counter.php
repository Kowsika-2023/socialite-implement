<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function increment() {
        Log::info("inc");
        $this->count++;
    }

    public function decrement() {
        $this->count--;
    }


    public function render()
    {
        Log::info("render");
        return view('livewire.counter');
    }
}
