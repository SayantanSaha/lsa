<?php
class Village extends Eloquent{
	public function Mouza()
    {
	return $this->belongsTo('Mouza');
    }
	public function Classes()
    {
        return $this->belongsToMany('LandClass','rates','village_id','class')->withPivot('rate');
    }
}
