<?php
namespace app\home\controller;
use think\Controller;

class Common extends Controller
{
    public function initialize()
    {
        $auth = new \think\Auth();


		//debug
		//echo $auth->Author;
		//exit;

        //获取当时登录用户的id
		//$uid = session('uid');

        //超级管理员不验证权限
		//if($uid = 1 ) {return true};

        //获取当前请求地址  模块/控制器/操作
        //$name = request()->module().'/'.request()->controller().'/'.request()->action();   // home/Per/index
        //echo $name;exit;


		$name = request()->module().'/'.request()->controller();
		$uid = 1;


		//if($auths->check('home/index', 1)){  //手动硬编码
		//if($auths->check($name, $uid)){
		//	//设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
		//	$this->success('登录成功!', '/home/login');  // '/home/login' URL is example.com/home/login ,  'home/login' URL is example.com/home/home/login 
		//} else {
		//	//错误页面的默认跳转页面是返回前一页，通常不需要设置
		//	$this->error('你没有权限!');            
		//}

		if(!$auth->check($name, $uid)){
			$this->error('你没有权限!');
		}



    }
}