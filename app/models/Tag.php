<?php

class Tag extends Eloquent {

    public function activities()
    {
        return $this->belongsToMany('Activity');
    }

    public function timeslices()
    {
        return $this->belongsTo('Timeslice');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
