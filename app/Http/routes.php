<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
 */
//redis有关object1 隠式控制器
Route::post('object1/update','Object1Controller@update');
Route::get('object1/adduser','Object1Controller@adduser');
Route::post('object1/adduserpost','Object1Controller@adduserpost');
Route::controller('object1','Object1Controller');


#Route::controller('/','IndexController');
Route::controller('reply','ReplyController');
Route::post('/','IndexController@getIndex');

Route::get('/test',function(){
	return "hello world";
});

Route::get('/user',function(){
	return 'user';
});



Route::get('/user/{id}',function($id){
	return $id;
})
->where('id','[0-9]+');

Route::get('404',function(){
	return App::abort(404);
});



Route::get('logout',function(){
	return Redirect::to('/user');
});

