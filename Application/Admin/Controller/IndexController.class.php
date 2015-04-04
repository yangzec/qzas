<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){       
        // die();
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
        $categories = M('posts')->where('post_status=0')->order('post_date desc')->limit(10)->select();
        $this->assign('posts',$categories);
        $setting = M('setting')->select();
        $this->assign('setting',$setting);
        $this->assign('last_time',session('LAST_TIME'));
        $this->assign('ip',session('LAST_IP'));
        $modelComment=new \Think\Model();
        $comment=$modelComment->table('as_comment comment,as_posts posts')->where('posts.post_ID=comment.comment_post_ID')->order('comment_date desc')->field('comment.comment_ID,comment.comment_author,comment.comment_content,posts.post_title,posts.post_ID,comment.comment_approved')->select();
        $this->assign('comment',$comment);
        // var_dump($comment);
        $this->display();
    }    
    public function approve_comment(){
        if(M('comment')->where('comment_id='.I('cid'))->save(array('comment_approved' => 1))){
            $this->success('审批成功',U('Admin/Index/index'));            
        }
    }
    public function verify_user(){
        if(M('users')->where('user_login="'.I('username').'" and user_pass="'.md5(I('pwd')).'"')->select()){
            $data=array(
                'last_login_time'=>date("Y-m-d H:i:s",time()),
            );
            M('users')->where('user_login="'.I('username').'"')->save($data);
            $time=M('setting')->where('id=4')->select();
            session('LAST_TIME',date('Y年m月d日 H:i:s',$time[0]['value']));
            M('setting')->where('id=4')->save(array('value'=>time())); 
            $ip=M('setting')->where('id=3')->select(); 
            session('LAST_IP',$ip[0]['value']); 
            M('setting')->where('id=3')->save(array('value'=>get_client_ip()));
            session(C('USER_AUTH_KEY'),I('username'));
            $this->success('登陆成功',U('Admin/Index/index'));
        }else{
            $this->error('登陆失败',U('Admin/Index/login'));
        }
    }
    public function logout(){
        session(C('USER_AUTH_KEY'),null);
        $this->success('退出成功',U('Admin/Index/login'));
    }
    public function login(){
        // M('setting')->where('id=4')->save(array('value'=>time()));
        $this->display();
    }
    public function register(){
        $this->display();
    }
    public function add_user(){
        if(M('users')->where('user_login="'.I('username').'"')->select()){
            $this->error('用户已存在',U('Admin/Index/register'));
        }else{
            $data=array(
                'user_login'=>I('username'),
                'user_pass'=>md5(I('pwd')),
                'user_registered'=>date("Y-m-d H:i:s",time()),
            );
            M('users')->data($data)->add();
            $this->success('注册成功，请登陆',U('Admin/Index/login'));
        }
    }
}