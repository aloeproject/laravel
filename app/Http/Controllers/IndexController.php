<?php
/**
 * File Name:IndexController.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Library\MsgFactory;


class IndexController extends Controller
{
	//消息入口
	public function getIndex(){
		$factory = new MsgFactory();
		//消息类型解析
		$this->validMsgType();
		$msgType = $this->msgType;
		$msgData = $this->dataObj;

		$factory->boot($msgType,$msgData);
		$factory->receive();
		$factory->reply();
		//异常消息处理
	}
}
