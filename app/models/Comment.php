<?php
class Comment extends Eloquent{

	public function application()
    {
        return $this->belongsTo('Application');
    }
	public function user()
    {
        return $this->belongsTO('User','created_by');
    }
	
}