<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    public function feedback()
    {
        return $this->hasMany('App\Models\FeedbackList', 'created_by', 'id');
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Roles', 'role', 'id');
    }

    public function isAdmin()
    {
        return $this->roles()->where('description', 'Administrator')->exists();
    }

    public function isMasterDealer()
    {
        return $this->roles()->where('description', 'Master Dealer')->exists();
    }

    public function isPremiumAgent()
    {
        return $this->roles()->where('description', 'Premium Agent')->exists();
    }

    public function isAgent()
    {
        return $this->roles()->where('description', 'Agent')->exists();
    }

    public function isRetailVvip()
    {
        return $this->roles()->where('description', 'Retail - VVIP')->exists();
    }
    public function isRetailPublic()
    {
        return $this->roles()->where('description', 'Retail - Public')->exists();
    }
}
