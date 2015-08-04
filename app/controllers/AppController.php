<?php

class AppController extends \BaseController {

	public function setLanguage($lng)
	{
		App::setLocale($lng);
		return $lng;
	}

}
