<?php
/**
 *  this is auth class for token gerate and validation
 */
 defined('ACCESS') || header("location:../");


 class auth {
	
   	static function  createToken() {
    	$seed = self::urlSafeEncode(random_bytes(8));
		$time = time();
		$hash = self::urlSafeEncode(hash_hmac('sha256', session_id() . $seed . $time, CSRF_TOKEN_SECRET, true));
		return self::urlSafeEncode($hash . '|' . $seed . '|' . $time);
	}

	static function  validateToken($token) {
		$parts = explode('|', self::urlSafeDecode($token));
		if(count($parts) === 3) {
			$hash = hash_hmac('sha256', session_id() . $parts[1] . $parts[2], CSRF_TOKEN_SECRET, true);
			if(hash_equals($hash, self::urlSafeDecode($parts[0]))) {
				return true;
			}
		}
		return false;
	}

	static function urlSafeEncode($m) {
		return rtrim(strtr(base64_encode($m), '+/', '-_'), '=');
	}
	static function urlSafeDecode($m) {
		return base64_decode(strtr($m, '-_', '+/'));
	}




}
