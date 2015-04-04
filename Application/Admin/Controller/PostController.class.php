<?php
namespace Admin\Controller;
use Think\Controller;
class PostController extends Controller {
    public function index(){
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
        import('ORG.Util.Page');
        $posts=M('posts')->where('post_status=0');
        $count=$posts->count();
        $Page=new \Think\Page($count,15);
        // $Page->setConfig('theme',"%upPage% %linkPage% %downPage%");
        $show=$Page->show();
        $this->assign('posts',$posts->where('post_status=0')->order('post_date desc')->limit($Page->firstRow.','.$Page->listRows)->select());        
        $this->assign('page',$show);
	   	$this->display();
    }
    public function trash(){
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
        import('ORG.Util.Page');
        $posts=M('posts')->where('post_status=1');
        $count=$posts->count();
        $Page=new \Think\Page($count,15);
        // $Page->setConfig('theme',"%upPage% %linkPage% %downPage%");
        $show=$Page->show();
        $this->assign('posts',$posts->where('post_status=1')->order('post_date desc')->limit($Page->firstRow.','.$Page->listRows)->select());        
        $this->assign('page',$show);
        $this->display();

    }
    public function postNews(){
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
        $data = array(
            'post_author' => '1',
            'post_status' => '-1'
        ); 
        session('pid',M('posts')->add($data));
        $categories = M('categories')->where('navigation_order=0')->select();
        $this->assign('categories',$categories);
    	$this->display();	
    }
    public function addCateRelation(){        
        $model=M('categories_relationships');
        $data=array(
            'post_ID' => session('pid'),
            'category_ID' => I('cate2add')
            );
        if(!$model->where($data)->select()){
            echo $model->data($data)->add();
            // dump('str');
        }
        // dump(session('pid'));
    }
    public function delCateRelation(){
        M('categories_relationships')->where('relation_id = '.I('cate2del'))->delete();
        // echo I('cate2del');
    }
    public function editPost(){  
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));      
        session('pid',null);
        $post=M('posts')->where('post_id = '.I('pid'))->select();        
        $categories = M('categories')->where('navigation_order=0')->select();
        // $my_categories = M('categories_relationships')->where('post_id = '.I('pid'))->select();
        $modelCategories=new \Think\Model();//table('user,reviews') reviews.pid='.$id.' and 
        $my_categories=$modelCategories->distinct('true')->table('as_categories_relationships relationships,as_categories categories')->where('relationships.category_ID=categories.category_ID and relationships.post_id = '.I('pid'))->field('categories.category_name,categories.category_id,relationships.relation_id')->select();
        $this->assign('my_categories',$my_categories);
        // var_dump($my_categories);
        $this->assign('categories',$categories);
        $this->assign('post',$post[0]);
        session('pid',I('pid'));
        // var_dump(session('pid'));
        $this->display();   
    }
    public function addNews(){
    	$data = array(
            'post_status' => '0',
    		'post_content' => I('content'),
            'post_general' => I('post_general'),
    		// 'post_date' => date("Y-m-d H:i:s",time()),
            'post_date' => time(),
            'post_modified' => time(),
    		'post_title' => I('title'),
            'pic_news' => I('pic_news')=='true'?true:false,
            // 'pic_news_url' => I('pic_news_url')[0],
            // 'post_status'=> I('block_news')=='true'?1:0
    	);
    	if(M('posts')->where('post_id='.session('pid'))->save($data)){
            $this->success('操作成功',U('Admin/Post/index'));
        }
        // echo session('pid');
    }
    public function delNews(){
        if(M('posts')->where('post_ID='.I('pid'))->save(array('post_status'=>1))){
           $this->success('操作成功');
        }
    }
    public function saveNews(){        
        $data = array(
            'post_author' => '1',
            'post_content' => I('content'),
            'post_general' => I('post_general'),
            'post_modified' => time(),
            'post_title' => I('title'),
            'pic_news' => I('pic_news')=='true'?true:false,
            'pic_news_url' => I('pic_news_url')[0],
            'post_status'=> I('post_status')=='true'?1:0
        );
        echo M('posts')->where('post_id='.session('pid'))->save($data);
        // echo 2;
    }
    public function addCate(){
        $data = array('category_name' => I('category_name'),'block_news'=>0); 
        echo M('categories')->data($data)->add();
    }
}
