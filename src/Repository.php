<?php

namespace Anutiger\Burnmsg;

use Validator;

class Repository implements Contract
{
	public function generateKey()
	{
		return sha1(microtime(true) . mt_rand(10000,90000));
	}
	
	public function ivSize()
	{
		return mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_CFB);
	}
	
	public function generateIv($iv_size = null)
	{
		return mcrypt_create_iv($iv_size ?: $this->ivSize(), MCRYPT_DEV_URANDOM);
	}
	
	public function store(array $data)
	{
		$this->validator($data, ['body' => 'required'])->validate();
		
		$msg = new Model;

        $key = $this->generateKey();
        $iv = $this->generateIv();

        $body = $this->encrypt($data['body'], $key, $iv);

        $msg->body = $body;
        $msg->url = Model::get_unique_url();
        $msg->iv = $iv;
		$msg->key = $key;
        $msg->save();
		
		return url('/burnmsg/' . $msg->url . '/' . $key);
	}
	
	public function destroy($url, $key)
	{
		$msg = Model::where('url', $url)->firstOrFail();
		
        if ($msg->destroyed) {
            $body = "This message has been destroyed";
        } else {
            $body = $this->decrypt($msg->body, $key, $msg->iv);
			$msg->update(['destroyed' => true]);
        }
		
		return $body;
	}
	
	public function encrypt($msg, $key = null, $iv = null)
	{
		$key2 = $key ?: $this->generateKey();
		$iv2 = $iv ?: $this->generateIv();
		
		return $key && $iv ? mcrypt_encrypt(MCRYPT_BLOWFISH, $key, $msg, MCRYPT_MODE_CFB, $iv) : ['body' => mcrypt_encrypt(MCRYPT_BLOWFISH, $key2, $msg, MCRYPT_MODE_CFB, $iv2), 'key' => $key2, 'iv' => $iv2];
	}
	
	public function decrypt($msg, $key, $iv)
	{
		return mcrypt_decrypt(MCRYPT_BLOWFISH, $key, $msg, MCRYPT_MODE_CFB, $iv);
	}
	
	protected function validator(array $data, array $rules)
	{
		return Validator::make($data, $rules);
	}
}