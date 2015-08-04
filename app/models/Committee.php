<?php
class Committee extends Eloquent{

	
	public function users()
	{
		return $this->belongsToMany('User')->orderBy('role');
	}
	public function applications()
	{
		return $this->belongsToMany('Application')->withPivot('status')->withTimestamps();
	}
}
