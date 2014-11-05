<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function activities()
    {
        return $this->hasMany('Activity');
    }

    public function customers()
    {
        return $this->hasMany('Customer');
    }

    public function projects()
    {
        return $this->hasMany('Project');
    }

    public function services()
    {
        return $this->hasMany('Service');
    }

    public function tags()
    {
        return $this->hasMany('Tags');
    }

    public function timeslices()
    {
        return $this->hasMany('Timeslice');
    }
}
