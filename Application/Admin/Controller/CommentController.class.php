<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
	public function index(){        
        import('ORG.Util.Page');
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
        // $modelComment = M('comment');
        // $comments = $modelComment->join('RIGHT JOIN as_posts ON as_posts.post_ID=as_comment.comment_post_ID' );


        $modelComment=new \Think\Model();
        $comments=$modelComment->table('as_comment comment,as_posts posts')->where('posts.post_ID=comment.comment_post_ID');
        $count=$comments->count();
        $Page=new \Think\Page($count,6);
        $show=$Page->show();
        // $comment=$comments->select();
        $comment=$modelComment->table('as_comment comment,as_posts posts')->where('posts.post_ID=comment.comment_post_ID')->order('comment_date desc')->limit($Page->firstRow.','.$Page->listRows)->field('comment.comment_ID,comment.comment_author,comment.comment_content,posts.post_title,posts.post_ID,comment.comment_approved,comment.comment_date')->select();
        $this->assign('page',$show);
        $this->assign('comment',$comment);
		$this->display();
	}
    public function approve(){
        M('comment')->where('comment_id='.I('cid'))->save(array('comment_approved' => 1 ));
        $this->success('操作成功',U('Admin/Comment/index'));
    }
    public function cancel(){
        M('comment')->where('comment_id='.I('cid'))->save(array('comment_approved' => 0));
        $this->success('操作成功',U('Admin/Comment/index'));
    }
}