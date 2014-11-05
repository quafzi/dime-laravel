<?php

class Activity extends Eloquent {

    public function customer()
    {
        return $this->belongsTo('Customer');
    }

    public function service()
    {
        return $this->belongsTo('Service');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function tags()
    {
        return $this->belongsToMany('Tags', 'activity_tags');
    }
}
