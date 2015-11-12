<?php
/**
 * File Name:TextServiceProvider.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/


namespace App\Providers\Recevie;
use App\Config\MsgTpl;
use App\Providers\Recevie\RecevieServiceProvider;

class TextServiceProvider extends RecevieServiceProvider
{
	private $toUser = null;
	private $fromUser = null;
	private $fromContent = null;

	public function receive(){
		$this->toUser = $this->dataObj->ToUserName;	
		$this->fromUser = $this->dataObj->FromUserName;	
		$this->fromContent = $this->dataObj->Content;

	}

	public function reply(){
		$strLen = mb_strlen($this->fromContent);	
		$msg = "您的消息是{$this->fromContent}  内容长度为{$strLen}";

		$tpl = MsgTpl::TEXT;
		$createTime = time();
		$content = sprintf($tpl,$this->fromUser,$this->toUser,$createTime,$msg);
		$this->renderXml($content);
	}
}
