<?php
namespace Admin\Controller;
use Think\Controller;
class PostController extends Controller {
    public function header(){
        $this->assign('username',session(C('USER_AUTH_KEY')));
    }
}