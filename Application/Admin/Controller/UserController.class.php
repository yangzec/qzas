<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
	public function index(){
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
		$this->display();
	}
}