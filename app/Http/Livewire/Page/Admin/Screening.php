<?php

namespace App\Http\Livewire\Page\Admin;

use App\Models\SanctionListWebsites;
use App\Models\Screening as ModelsScreening;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Screening extends Component
{    
    use WithPagination;

    public $search = '';
    public $screeningList;
    public $currentAccountScreen, $currentScreeningStatus;

    public function mount()
    {
        $this->screeningList = SanctionListWebsites::all();
    }

    public function screen($id)
    {
        // Get current account data
        $this->currentAccountScreen = User::where('id', $id)->first();

        // Get screening list status
        $screeningListStatus = $this->getScreeningListStatus($id);

        // Check if screeningListStatus is empty
        if($screeningListStatus->isEmpty()) {
            // Create new screening list
            foreach($this->screeningList as $sanction) {
                ModelsScreening::create([
                    'user_id'       => $id,
                    'sanction_id'   => $sanction->id,
                    'status'        => 0,
                    'created_by'    => auth()->user()->id,
                ]);
            }

            // Get screening list status
            $this->currentScreeningStatus = $this->getScreeningListStatus($id);
        }
        else {
            // Use existing screening list
            $this->currentScreeningStatus = $screeningListStatus;
        }

        dd($this->currentScreeningStatus);
    }

    private function getScreeningListStatus($id)
    {
        return ModelsScreening::where('user_id', $id)->get();
    }
    
    public function render()
    {
        return view('livewire.page.admin.screening',[
            'list' => User::where('name', 'like', '%' . $this->search . '%')->whereRole(2)->whereActive(0)->paginate(10),
        ]);
    }
}
