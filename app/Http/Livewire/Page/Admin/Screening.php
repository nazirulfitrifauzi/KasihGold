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
    public $remarks;

    public function screenResult($user_id, $screen_id, $status)
    {
        return ModelsScreening::create([
            'user_id'       => $user_id,
            'sanction_id'   => $screen_id,
            'status'        => $status == "pass" ? 1 : 0,
            'created_by'    => auth()->user()->id,
        ]);
    }

    public function finalResult($user_id, $status)
    {
        if ($status == 'terima')
        {
            User::whereId($user_id)
                ->update([
                    'active' => 1
                ]);

            session()->flash('type', 'success');
            session()->flash('title', 'Info');
            session()->flash('message', 'User successfully approved.');
        }
        elseif ($status == 'tolak')
        {
            User::whereId($user_id)
                ->update([
                    'active' => 2
                ]);

            session()->flash('type', 'success');
            session()->flash('title', 'Info');
            session()->flash('message', 'User has been declined.');
        }

        return redirect()->to('/admin/screening');
    }
    
    public function render()
    {
        return view('livewire.page.admin.screening',[
            'list' => User::where('name', 'like', '%' . $this->search . '%')
                            ->whereRole(2)
                            ->whereActive(0)
                            ->paginate(10),
            'sanctionList' => SanctionListWebsites::all(),
        ]);
    }
}
