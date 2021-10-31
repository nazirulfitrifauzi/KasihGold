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
    // public $status;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function mount()
    // {
    //     $this->status = 0;
    // }

    protected $rules = [
        'referral_codes.*.code' => 'required|min:6',
    ];

    // function random_strings($length_of_string)
    // {
    //     $str_result = '1234567890abcdefghijklmnopqrstuvwxyz';
    //     return substr(str_shuffle($str_result), 0, $length_of_string);
    // }

    // public function generate($userId)
    // {
    //     $user = User::whereId($userId)->first();

    //     $words = explode(' ', $user->name);
    //     if (count($words) >= 2) {
    //         $initial = strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    //     } else {
    //         preg_match_all('#([A-Z]+)#', $user->name, $capitals);
    //         if (count($capitals[1]) >= 2) {
    //             return substr(implode('', $capitals[1]), 0, 2);
    //         }
    //         $initial = strtoupper(substr($user->name, 0, 2));
    //     }

    //     $randomNo = $this->random_strings(4);
    //     $referralCode = $initial . $randomNo;
    //     $this->referral_codes[$userId]['code'] = $referralCode;
    //     $this->status = true;
    // }

    public function approve($id)
    {
        // if($this->status == 0)
        // {
        //     $this->referral_codes[$id]['code'] = "";
        // }

        // validate referal code
        $this->validate();

        // dd($this->referral_codes[$id]['code']);
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
