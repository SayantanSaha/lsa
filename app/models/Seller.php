<?php
class Seller extends Eloquent{

	public function village()
    {
        return $this->belongsTo('Village');
    }
	public function application()
    {
        return $this->belongsTo('Application');
    }
	public function mouza()
    {
        return $this->belongsTo('Mouza');
    }
	public function remainingLand()
    {
        return $this->hasMany('RemainingLand');
    }
	
}
