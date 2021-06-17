<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'type',
        'client'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdminKG()
    {
        return $this->whereClient(1)->whereRole(1)->exists();
    }

    public function isMasterDealerKG()
    {
        return $this->whereClient(1)->whereRole(2)->exists();
    }

    public function isAgentKG()
    {
        return $this->whereClient(1)->whereRole(3)->exists();
    }

    public function isUserKG()
    {
        return $this->whereClient(1)->whereRole(4)->exists();
    }

    public function isAdminKAP()
    {
        return $this->whereClient(2)->whereRole(1)->exists();
    }

    public function isAgentKAP()
    {
        return $this->whereClient(2)->whereRole(3)->exists();
    }

    public function isUserKAP()
    {
        return $this->whereClient(2)->whereRole(4)->exists();
    }

    public function feedback()
    {
        return $this->hasMany('App\Models\FeedbackList', 'created_by', 'id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Roles', 'role', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\UserType', 'type', 'id');
    }

    public function screening()
    {
        return $this->hasMany('App\Models\Screening', 'user_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile_personal', 'user_id', 'id');
    }

    public function bank()
    {
        return $this->hasOne('App\Models\Profile_bank_info', 'user_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Models\ClientsInfo', 'client', 'id');
    }

    public function upline()
    {
        return $this->hasOne('App\Models\UserUpline', 'user_id', 'id');
    }

    public function downline()
    {
        return $this->hasMany('App\Models\UserDownline', 'user_id', 'id');
    }

    public function gold()
    {
        return $this->hasMany('App\Models\GoldbarOwnership', 'user_id', 'id');
    }
}
