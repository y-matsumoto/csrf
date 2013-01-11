<?php

class Csrf {
  const KEY_NAME = 'csrf';

	public static function generate() {
		return $_SESSION[self::KEY_NAME] = sha1(uniqid(mt_rand(), true));
	}

	public static function check($postKey) {
		if (!isset($postKey) or !isset($_SESSION[self::KEY_NAME])) {
			return false;
		}

		if ($_SESSION[self::KEY_NAME] != $postKey) {
			return false;
		}
		
    return true;
	}
}
