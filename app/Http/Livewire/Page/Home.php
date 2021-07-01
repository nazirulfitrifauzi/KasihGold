<?php

namespace App\Http\Livewire\Page;

use App\Models\GoldbarOwnership;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public $pendingApproval;
    public $myAgent;
    public $activeUser;
    public $userGold;
    public $tGold, $goldInfo;

    public function mount()
    {
        if (auth()->user()->isAdminKAP()) {
            $this->pendingApproval = User::where('client', 2)->where('role', 3)->where('active', 0)->get();
            $this->myAgent = User::where('client', 2)->where('role', 3)->where('active', 1)->get();
        } elseif (auth()->user()->isAgentKAP()) {
            $logged_user = auth()->user()->id;
            $this->pendingApproval = User::whereHas('profile', function ($query) use ($logged_user) {
                $query->where('agent_id', '=', $logged_user);
            })->whereClient(2)->whereRole(4)->whereActive(0)->get();

            $this->activeUser = User::where('client', 2)->where('role', 4)->where('active', 1)->get();
        }

        $goldInfo = GoldbarOwnership::where('user_id', auth()->user()->id)->where('active_ownership', 1)->get();
        $this->tGold = 0;
        foreach ($goldInfo as $golds) {
            $this->tGold += $golds->weight;
        }
    }

    public function render()
    {
        return view('livewire.page.home');
    }
}
