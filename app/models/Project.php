<?php

class Project extends Eloquent {

    public function customer()
    {
        return $this->belongsTo('Customer');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
