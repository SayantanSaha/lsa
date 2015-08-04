<?php
class Subdivision extends Eloquent{
	public function circles()
    {
        return $this->hasMany('Circle');
    }
	public function district()
    {
        return $this->belongsTo('District');
    }
}