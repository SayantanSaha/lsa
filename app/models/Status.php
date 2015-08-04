<?php
class Status extends Eloquent{
	
	protected $table = 'statuses';

	public function application()
    {
		
        return $this->belongsToMany('Application','application_status');
    }
	
}