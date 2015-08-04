<?php
class District extends Eloquent{

	public function subdivisions()
    {
        return $this->hasMany('Subdivision');
    }
	public function circles()
    {
        return $this->hasManyThrough('Circle', 'Subdivision');
    }
}