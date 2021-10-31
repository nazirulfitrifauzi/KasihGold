<?php

namespace App\Http\Livewire\Page\Kap;

use App\Mail\KAP\ApprovedUser;
use App\Models\Profile_personal;
use App\Models\ReferralCode;
use App\Models\User;
use App\Models\UserDownline;
use App\Models\UserUpline;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class PendingApprovalKap extends Component
{
    use WithPagination;

    public $search = '';
    public $referral_codes;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'referral_codes.*.code' => 'required|min:6',
    ];

    public function approve($id)
    {

        // validate referal code
        $this->validate();

        //update user for active
        User::whereId($id)->update(['active' => 1]);

        //update profile info for the successor
        Profile_personal::where('user_id', $id)->update([
            'introducer_code' => auth()->user()->id,
            'introducer_name' => auth()->user()->name,
        ]);

        // insert or update referral code for agent
        ReferralCode::updateOrCreate([
            'user_id'       => $id
        ], [
            'referral_code' => $this->referral_codes[$id]['code'],
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
        session()->flash('message', 'Agent has been approved.');
    }

    public function render()
    {
        return view('livewire.page.kap.pending-approval-kap', [
            'list' => User::whereClient(2)
                            ->whereRole(3)
                            ->whereActive(0)
                            ->where('email', 'like', '%' . $this->search . '%')
                            ->paginate(10),
        ]);
    }
}
