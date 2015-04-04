<?php
namespace Admin\Controller;
use Think\Controller;
class SettingController extends Controller {
	public function index(){   	 
        if(session(C('USER_AUTH_KEY'))==null){
            $this->error('请登录',U('Admin/Index/login'));
        }
        $this->assign('username',session(C('USER_AUTH_KEY')));
    	$nav=M('categories')->where('block_news=0')->order('navigation_order')->select();
    	// dump(M('setting')->select());
    	// $icp=M('setting')->where('@key = "icp"')->select();
    	$icp=M('setting')->where(array('key'=>'icp'))->select();    	
    	$site_name=M('setting')->where(array('key'=>'site_name'))->select();
    	$this->assign('icp',$icp[0]);
    	$this->assign('site_name',$site_name[0]);
        // $jggk=M('categories')->where('block_news=1')->order('navigation_order asc')->select();
        // $this->assign('jggk',$jggk);
        // $msc=M('categories')->where('block_news=2')->order('navigation_order asc')->select();
        // $this->assign('msc',$msc);
        // $bzfh=M('categories')->where('block_news=3')->order('navigation_order asc')->select();
        // $this->assign('bzfh',$bzfh);
        $model=new \Think\Model();//table('user,reviews') reviews.pid='.$id.' and //                                                    and categories.navigation_url='.$arg
        $msc=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=2')->order('navigation_order asc')->field('categories.category_name,posts.post_title,posts.post_id')->select();
        // var_dump($msc);
        $this->assign('msc',$msc);
        $jggk=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=1')->order('navigation_order asc')->field('categories.category_name,posts.post_title,posts.post_id')->select();
        //M('categories')->where('block_news=1')->select();
        $this->assign('jggk',$jggk);
        // $msc=M('categories')->where('block_news=2')->select();
        $bzfh=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=3')->order('navigation_order asc')->field('categories.category_name,posts.post_title,posts.post_id')->select();
        //=M('categories')->where('block_news=3')->select();
        $this->assign('bzfh',$bzfh);

    	$this->assign('nav',$nav);  
		$this->display();
	}
	public function updateNav(){
		$data = array(
				'category_name' => I('category_name'),
				'navigation_url' => I('navigation_url'),
                'url' => I('url'),
			);
		M('categories')->where('category_ID='.I('category_id'))->save($data);//.I('category_id')
		// dump($data);
	}
}