<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$this->nav();
        // var_dump($this->nav());	
        $pic_news=M('posts')->where('pic_news=1')->order('post_date desc')->limit('6')->select();
    	$this->assign('pic_news',$pic_news);
        // dump($pic_news);
    	// dump(M('posts')->where('post_ID=1')->select());
        // $this->show('大家好','utf-8');
        $model=new \Think\Model();//table('user,reviews') reviews.pid='.$id.' and //                                                    and categories.navigation_url='.$arg
        $msc=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=2')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        // var_dump($msc);
        $this->assign('msc',$msc);
        $jggk=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=1')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        //M('categories')->where('block_news=1')->select();
        $this->assign('jggk',$jggk);
        // $msc=M('categories')->where('block_news=2')->select();
        $bzfh=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=3')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        //=M('categories')->where('block_news=3')->select();
        $this->assign('bzfh',$bzfh);

        $this->assign('association_news',$this->get_news_list('association_news'));
        $this->assign('block1',$this->get_news_list('standard_news'));
        // var_dump($this->get_news_list('infos'));
        $this->assign('block2',$this->get_news_list('notice'));
        // $this->assign('block3',$this->get_news_list('policy'));
        $this->assign('block4',$this->get_news_list('law'));
        $this->assign('block5',$this->get_news_list('policy'));
        $this->assign('block6',$this->get_news_list('exchange'));
        $this->assign('block7',$this->get_news_list('knowledge'));  
        $this->assign('block8',$this->get_news_list('bbs'));   
        $this->display();
    }
    public function get_news_list($arg){
        $model=new \Think\Model();//table('user,reviews') reviews.pid='.$id.' and //                                                    and categories.navigation_url='.$arg
        $list=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and posts.post_status=0 and categories.navigation_url = "'. $arg .'"')->order('post_date')->field('posts.post_title,posts.post_id,posts.post_date')->limit(7)->select();
        // $list=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id='.$arg.' and relationships.post_id = posts.post_id')->field('posts.post_title')->select();
        return $list;
    }
    public function about(){
        $model=new \Think\Model();//table('user,reviews') reviews.pid='.$id.' and //                                                    and categories.navigation_url='.$arg
        $msc=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=2')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        // var_dump($msc);
        $this->assign('msc',$msc);
        $jggk=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=1')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        //M('categories')->where('block_news=1')->select();
        $this->assign('jggk',$jggk);
        // $msc=M('categories')->where('block_news=2')->select();
        $bzfh=$model->distinct('true')->table('as_categories_relationships relationships,as_categories categories,as_posts posts')->where('relationships.category_id=categories.category_id and relationships.post_id = posts.post_id and categories.block_news=3')->order('navigation_order asc')->field('categories.category_ID,categories.category_name,posts.post_title,posts.post_content')->select();
        //=M('categories')->where('block_news=3')->select();
        $this->assign('bzfh',$bzfh);
        // var_dump($jggk);
    	$this->nav();	
    	$this->display();
    }
    public function postComment(){
        $comment_author=I('comment_author');
        $comment_authro_email=I('comment_authro_email');
        $comment_content=I('comment_content');
        $data=array(
                'comment_post_ID'=>session('pid'),
                'comment_author'=>$comment_author,
                'comment_author_email'=>$comment_authro_email,
                'comment_content'=>$comment_content,
                'comment_date'=>time(),
                'comment_author_IP'=>get_client_ip(),
                'comment_post_title'=>session('ptitle'),
                // 'comment_approved'=>0,
            );
        M('comment')->data($data)->add();
        echo '1';
    }
    public function news(){
        $this->nav();
        import('ORG.Util.Page');
        $posts=M('posts')->where('post_status=0');
        $count=$posts->count();
        $Page=new \Think\Page($count,15);
        $show=$Page->show();
        $this->assign('posts',$posts->where('post_status=0')->order('post_date desc')->limit($Page->firstRow.','.$Page->listRows)->select());  
    	$this->assign('Page',$show);
        $this->display();
    }
    public function post(){ 
    	$this->nav();	
        if($post=M('posts')->where('post_id='.I('pid'))->select()){
            M('posts')->where('post_id='.I('pid'))->setInc('view_count',1);
            $comment=M('comment')->where('comment_post_ID='.I('pid').' and comment_approved=1')->select();
            // var_dump('comment_post_ID='.I('pid').' and comment_approved=0');
            $this->assign('post',$post[0]);
            $this->assign('comment',$comment);
        }        
        session('ptitle',$post[0]['post_title']);
        session('pid',I('pid'));
    	$this->display();
    }
    public function services(){ 
    	$this->nav();	
    	$this->display();
    }
    public function code(){
    	$this->nav();	
    	$this->display();
    }
    public function trainings(){ 
    	$this->nav();	
    	$this->display();
    }
    public function vips(){ 
    	$this->nav();	
    	$this->display();
    }
    public function query(){
    	$this->nav();	  	
    	$this->display();
    }
    public function contact(){ 
    	$this->nav();		
    	$this->display();
    }
    public function nav(){    	 
    	$nav=M('categories')->where('block_news=0')->order('navigation_order asc')->select();
        // var_dump($nav);
    	$this->assign('nav',$nav);
    }
}