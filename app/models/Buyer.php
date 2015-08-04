<?php
class Buyer extends Eloquent{

	public function application()
    {
        return $this->belongsTo('Application');
    }
	
	
}