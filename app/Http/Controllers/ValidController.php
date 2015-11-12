<?php
/**
 * File Name:ValidController.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class ValidController extends Controller
{
	const TOKEN = 'hellowsunloe';

	public function getIndex(){
		$echoStr = isset($_GET["echostr"])?$_GET['echostr']:'';
        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        } else {
			echo 'error';
		}
	}

	private function checkSignature()
	{
        
        $signature = isset($_GET["signature"])?$_GET['signature']:'';
        $timestamp = isset($_GET["timestamp"])?$_GET['timestamp']:'';
        $nonce = isset($_GET["nonce"])?$_GET['nonce']:'';
	t
		$token = self::TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}


