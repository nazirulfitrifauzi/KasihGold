<?php

namespace App\Http\Livewire\Page\Kap;

use App\Mail\KAP\ApprovedUser;
use App\Models\Profile_personal;
use App\Models\User;
use App\Models\UserDownline;
use App\Models\UserUpline;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class PendingApprovalKapAgent extends Component
{
    use WithPagination;

    public $search = '';
    public $list;
    public $membership_id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function approve($id)
    {
        $data = $this->validate([
            'membership_id'       => 'required',
        ]);

        //update user for active
        User::whereId($id)->update(['active' => 1]);

        //update profile info for the successor
        Profile_personal::where('user_id', $id)->update([
            'membership_id'     => $this->membership_id[$id],
            'introducer_code'   => auth()->user()->id,
            'introducer_name'   => auth()->user()->name,
        ]);

        //update downline for the iniator
        UserDownline::create([
            'user_id'       => auth()->user()->id,
            'downline_id'   => $id,
        ]);

        //update upline for the successor
        UserUpline::create([
            'user_id'       => $id,
            'upline_id'   => auth()->user()->id,
        ]);

        //send out email to the successor to notified their status
        $user = User::whereId($id)->first();
        Mail::to($user->email)->send(new ApprovedUser());

        //flash message to initiator
        session()->flash('success');
        session()->flash('title', 'Success!');
        session()->flash('message', 'User has been approved.');

        return redirect()->to('/pending-approval-kap-agent');
    }

    public function render()
    {
        $logged_user = auth()->user()->id;

        return view('livewire.page.kap.pending-approval-kap-agent', [
            'list' => User::whereHas('profile', function ($query) use ($logged_user) {
                            $query->where('agent_id', '=', $logged_user);
                        })
                        ->whereRole(4)
                        ->whereActive(0)
                        ->paginate(10),
        ]);
    }
}
