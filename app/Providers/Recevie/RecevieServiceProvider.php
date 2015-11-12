<?php
/**
 * File Name:Providers/Recevie/RecevieServiceProvider.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/


namespace App\Providers\Recevie;

use Illuminate\Support\ServiceProvider;

abstract class RecevieServiceProvider extends ServiceProvider
{
	protected $dataObj = null;

	public function register(){
	
	}

	public function __construct($dataObj){
		$this->dataObj = $dataObj;	
	}

	public function renderXml($msg){
		echo $msg;
	
	}
	abstract public function receive();
	abstract public function reply();
}
