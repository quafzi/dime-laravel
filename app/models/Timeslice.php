<?php

class Timeslice extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tags', 'timeslice_tags');
    }
}
