<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Config\MsgType;
use App\Config\Errors;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

	protected $msgType = null;
	protected $dataObj = null;

	public function validMsgType(){
		$msgType = null;
		$postObj = null;
		$postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"])?$GLOBALS['HTTP_RAW_POST_DATA']:'';
		if (!empty($postStr)) {
			libxml_disable_entity_loader(true);
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

			$msgType = strval($postObj->MsgType);
			if (!in_array($msgType,MsgType::$supportType)) {
				throw new Exception(Errors::$errorMsg[Errors::MSG_TYPE_ERROR],Errors::MSG_TYPE_ERROR);
			} 
		} else {
			throw new Exception(Errors::$errorMsg[Errors::SYSTEM_ERROR],Errors::SYSTEM_ERROR);
		}	
		$this->msgType = $msgType;
		$this->dataObj = $postObj;
	}

	public function getMsgType(){
		return $this->msgType;
	}

}
