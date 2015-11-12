<?php
/**
 * File Name:Object1.php
 * @author              $Author:lukang$
 * @email               $lk88boy@gmail.com$
*/

namespace App\Http\Controllers;
use MyRedis;
use Input;
use App\Http\Controllers\Controller;

class Object1Controller extends Controller
{
	private $redisKey = 'object1.username';
	private $userListKey = 'object1.userList';
	//默认执行方法
	public function getIndex(){
		$userName = MyRedis::get($this->redisKey);
		$userName = empty($userName)?"你还未配置姓名":$userName;

		return view('object1.index', 
			array('name'=>$userName)
		);
	}

	public function update(){
		$name = Input::get('name');

		if (empty($name)) {
			echo "<script>alert('姓名不能为空');window.location='/object1';</script>";
		} else {
			MyRedis::set($this->redisKey,$name);
			echo "<script>alert('姓名修改成功');window.location='/object1';</script>";
		}
	}

	public function getUserlist(){
		$pageSize = 5;
		$page = Input::get('page');
		$totalCount = MyRedis::llen($this->userListKey);
		$pre = ($page - 1 == 0)?1:($page - 1);
		$next = $page + 1;
		$page = empty($page) ? 0:($page - 1);
		$start = $page * $pageSize;
		//因为从0开始
		$end = $start + ($pageSize - 1);
		//起始位置  0开始 结束位置  0开始
		$userList = MyRedis::lrange($this->userListKey,$start,$end);
	
		foreach ($userList as &$item) {
			$item = json_decode($item,true);
			$item['create_time'] = date("Y-m-d H:i:s",$item['create_time']);
		}
		return view('object1.userlist', 
			array(
				'userList'=>$userList,
				'totalCount'=>$totalCount,
				'pre'=>$pre,
				'next'=>$next,
			)
		);

	}

	public function adduser(){
		return view('object1.adduser', 
			array()
		);
	}

	public function adduserpost(){
		$name = Input::get('name');

		$len = MyRedis::llen($this->userListKey);
		if (empty($name)) {
			echo "<script>alert('姓名不能为空');window.location='/object1/userlist';</script>";
		} else {
			//最后一个id加一
			$lastData = MyRedis::lindex($this->userListKey,-1);
			if (empty($lastData)) {
				$lastId = 1;
			} else {
				$lastData = json_decode($lastData,true);
				$lastId = $lastData['id'] + 1;
			}
			$arr['id'] = $lastId;
			$arr['name'] = $name;
			$arr['create_time'] = time();
			$str = json_encode($arr);
			MyRedis::rpush($this->userListKey,$str);
			echo "<script>alert('用户添加成功');window.location='/object1/userlist';</script>";
		}
	}
}
