<?php

namespace AP\Burnmsg;

use Illuminate\Support\Facades\Facade as Base;

class Facade extends Base
{
	protected static function getFacadeAccessor()
	{
		return 'burnmsg';
	}
}