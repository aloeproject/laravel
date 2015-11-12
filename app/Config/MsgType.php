<?php
/**
 * File Name:Config/MsgType.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/


namespace App\Config;

class MsgType
{
	const TEXT	= 'text';
	const IMAGE = 'image';

	public static $supportType = array(
		self::TEXT,self::IMAGE,
	);
}
