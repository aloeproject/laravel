<?php
/**
 * File Name:Config/MsgTpl.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/
namespace App\Config;

class MsgTpl
{
	//接受者 发送者 当前时间戳 消息类型 内容
	const TEXT = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>';

}
