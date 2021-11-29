<?php

namespace App\Http\Livewire;

use App\Models\BloodDonation;
use App\Models\DonationCamp;
use Livewire\Component;

class BloodSearch extends Component
{
    public function render()
    {
        return view('livewire.blood-search', ['bloodsearch' => BloodDonation::with('camp')->get()]);
    }
}
