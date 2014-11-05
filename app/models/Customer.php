<?php

class Customer extends Eloquent {

    public function projects()
    {
        return $this->hasMany('Project');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
