<?php
// Copyright 2022 - Romain Sickenberg <r.sickenberg@gmail.com>

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Antistatique extends Component
{
    public int $max = 10;
    public int $loveCounter = 0;
    public bool $shouldReturnToZero = false;

    public function render(): Factory|View|Application
    {
        return view('livewire.antistatique');
    }

    public function showLove(): void
    {
        if ($this->loveCounter !== $this->max) {
            $this->loveCounter++;
        }
        if ($this->loveCounter === $this->max) {
            $this->shouldReturnToZero = true;
        }
    }

    public function removeLove(): void
    {
        if ($this->loveCounter !== 0) {
            $this->loveCounter--;
        }
        if ($this->loveCounter === 0) {
            $this->shouldReturnToZero = false;
        }
    }
}
