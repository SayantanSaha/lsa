<?php
class Application extends Eloquent{

	public function village()
    {
        return $this->belongsTo('Village','landVill');
    }
	public function mouza()
    {
        return $this->belongsTo('Mouza','landMouza');
    }
	public function circle()
    {
        return $this->belongsTo('Circle');
    }
	public function attachments()
	{
		return $this->hasMany('Attachment');
	}
	public function sellers()
	{
		return $this->hasMany('Seller');
	}
	public function user()
	{
		return $this->belongsTo('User','created_by');
	}
	public function remaining_land()
	{
		return $this->hasMany('RemainingLand');
	}
	public function buyers()
	{
		return $this->hasMany('Buyer');
	}
	public function comments()
	{
		return $this->hasMany('Comment')->orderBy('created_at','DESC');
	}
	public function status()
    {		
        return $this->belongsToMany('Status','application_status')->withTimestamps()->orderBy('pivot_created_at','DESC');
    }
	public function committees()
    {		
        return $this->belongsToMany('Committee')->withPivot('status')->withTimestamps();
    }
	public function scopeIncomplete($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=1 and id in (select max(id) from application_status group by application_id)  )');
    }
	public function scopeCo($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=2 and id in (select max(id) from application_status group by application_id)  )');
    }
	public function scopeCoReturn($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=3 and id in (select max(id) from application_status group by application_id)  )');
    }
	public function scopeAdc($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=4 and id in (select max(id) from application_status group by application_id)  )');
    }
	public function scopeAdcReturn($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=5 and id in (select max(id) from application_status group by application_id)  )');
    }
	public function scopeComplete($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=9 and id in (select max(id) from application_status group by application_id)  )');
    }
    public function scopeSro($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=7 and id in (select max(id) from application_status group by application_id)  )');
    }
    public function scopeMb($query)
    {
        return $query->whereRaw('isUrban=1 and id in (select application_id from application_status where status_id=9 and id in (select max(id) from application_status group by application_id)  )');
    }
    public function scopeDc($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=6 and id in (select max(id) from application_status group by application_id)  )');
    }
    public function scopeCoOverdue($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=2 and id in (select max(id) from application_status group by application_id) and DATEDIFF(CURDATE(),cast(created_at as date))>3 )');
    }
    public function scopeAdcOverdue($query)
    {
        return $query->whereRaw('id in (select application_id from application_status where status_id=4 and id in (select max(id) from application_status group by application_id) and DATEDIFF(CURDATE(),cast(created_at as date))>2 )');
    }
}
