<?php

namespace App\Http\Livewire;

use App\Models\Banner;
use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public $banners,$services;
    public function render()
    {
        $banners = Banner::where('status',1)->get();
        $services = Service::where('status',1)->get();
        return view('livewire.index',['banners'=>$banners,'services'=>$services]);
    }
}
