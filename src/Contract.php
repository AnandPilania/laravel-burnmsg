<?php

namespace AP\Burnmsg;

interface Contract
{
	public function generateKey();
	public function ivSize();
	public function generateIv($iv_size = null);
	public function encrypt($key, $msg, $iv);
	public function decrypt($key, $msg, $iv);
}