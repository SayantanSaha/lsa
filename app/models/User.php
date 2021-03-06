<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public function roles()
	    {
		return $this->belongsToMany('Role');
	    }
	public function district()
	    {
		return $this->belongsTo('District');
	    }
	public function circle()
	    {
		return $this->belongsTo('Circle');
	    }

	public function comments()
	    {
		return $this->hasMany('Comment','created_by');
	    }
	public function applications()
	    {
		return $this->hasMany('Application','created_by');
	    }
	public function committee()
		{
		return $this_>belongsToMany('Committee');	
		}
}
