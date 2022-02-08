<?php

namespace App\Http\Livewire;

use App\Models\BloodDonation;
use App\Models\BloodStock;
use App\Models\DonationCamp;
use Livewire\Component;

class BloodSearch extends Component
{
    public function render()
    {
        $bloodsearch = BloodStock::all();
        foreach($bloodsearch as $search){
            $search->bloodType;
            dd($search);
            
        }
        
        return view('livewire.blood-search', ['bloodsearch' => BloodStock::all()]);
        
    }
}
