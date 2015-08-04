<?php
class Mouza extends Eloquent{
	public function circle()
    {
        return $this->belongsTo('Circle');
    }
	public function villages()
    {
        return $this->hasMany('Village');
    }
	public function applications()
	{
		return $this->hasMany('Application','landMouza');
	}
}