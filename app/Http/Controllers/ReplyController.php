<?php
/**
 * File Name:ReplyController.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
	//消息入口
	public function getIndex(){
		//get post data, May be due to the different environments
		$postStr = isset($GLOBALS["HTTP_RAW_POST_DATA"])?$GLOBALS['HTTP_RAW_POST_DATA']:'';


      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {
              		$msgType = "text";
                	$contentStr = "{$fromUsername} {$toUsername}Welcome to wechat world!";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "Input something...";
                }

        }else {
        	echo "22";
        	exit;
        }
	}
}
