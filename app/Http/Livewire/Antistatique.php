<?php
/*
 * Copyright 2022 - Romain Sickenberg <r.sickenberg@gmail.com>
 */

namespace App\Http\Livewire;

use Livewire\Component;

class Antistatique extends Component
{
    public int $loveCounter = 0;

    public function render()
    {
        return view('livewire.antistatique');
    }

    public function showLove(): void
    {
        $this->loveCounter++;
    }
}
