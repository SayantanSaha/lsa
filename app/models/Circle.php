<?php
class Circle extends Eloquent{
	public function subdivision()
    {
        return $this->belongsTo('Subdivision');
    }
	public function mouzas()
    {
        return $this->hasMany('Mouza');
    }
	public function villages()
    {
        return $this->hasManyThrough('Village','Mouza');
    }
	public function applications()
    {
        return $this->hasMany('Application');
    }
	public function users()
	{
		return $this->hasMany('User')->orderBy('role');
	}
}
