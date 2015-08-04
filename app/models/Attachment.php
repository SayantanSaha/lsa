<?php
class Attachment extends Eloquent{
	
	protected $table = 'files';
	public function application()
    {
        return $this->belongsTo('Application');
    }
	
}