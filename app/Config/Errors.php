<?php
/**
 * File Name:Errors.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/


namespace App\Config;

class Errors
{
	const SUCCESS = 0;
	const MSG_TYPE_ERROR = 1;

	const SYSTEM_ERROR = 999;

	public static $errorMsg = array(
		self::MSG_TYPE_ERROR=>'消息类型不存在或者不支持',
		self::SYSTEM_ERROR=>'消息类型不存在或者不支持',
	);
}
