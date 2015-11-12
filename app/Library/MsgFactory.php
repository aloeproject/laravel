<?php
/**
 * File Name:MsgFactory.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/

namespace App\Library;

class MsgFactory
{

	private $provide = null;
	//初始化消息类型
	public function boot($msgType,$dataObj){
		$type = ucfirst($msgType);
		$filename = $type.'ServiceProvider';
		$file = APP_PATH.'/Providers/Recevie/'.$filename.'.php';
		if (is_file($file)) {
			$class = "\App\Providers\Recevie\\".$filename;
			$this->provide = new $class($dataObj);
		} else {
			 throw new Exception(Errors::$errorMsg[Errors::SYSTEM_ERROR],Errors::SYSTEM_ERROR);
		}
	}

	//接受消息
	public function receive(){
		$this->provide->receive();
	}

	//回复消息
	public function reply(){
		$this->provide->reply();
	}
}
