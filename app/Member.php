<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'birthday', 'residential_address', 'wedding_anniversary', 'home_phone_number', 'office_phone_number', 'cell_phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'status_id', 'fellowship_group_id',
        'discipler_id',
    ];

    public function fellowshipGroup()
    {
        return $this->belongsTo(FellowshipGroup::class, 'member_id');
    }

    public function discipler()
    {
        return $this->hasMany(Member::class, 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'member_id');
    }
}
