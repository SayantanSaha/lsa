<?php
class RemainingLand extends Eloquent{

	
	protected $table = 'remaining_land';
	
	public function application()
    {
        return $this->belongsTo('Application');
    }
	
}
