<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //$this->show('thinkphp');
        $db=M('provinces');
        
        $result=S('result');
        if(!$result){
        	$result=$db->select();
        	//p($result);
        	S('result',$result,30);
        }
        $this->assign('province',$result);

        $this->display();
    }
    public function getCity(){
    	$proID=I('provinceid');
    	if(IS_AJAX){
    		///p($proID);
    		$db=M('cities');
    		$where=array('provinceid'=>$proID);
    		$city=$db->where($where)->select();
    		//p($city);
    		
    		/**
    		 * 返回类型有三种情况
    		 * 1.北上津 等直辖市  		返回市辖区
    		 * 2.港澳台 				返回空
    		 * 3.正常的地级市		
    		 */
    		
    		if($city){
    			$this->ajaxReturn($city);
    		}
    	}else{
    		$this->error('非法请求');
    	}
    }
    public function getArea(){
    	$citID=I('cityid');
    	if(IS_AJAX){
    		//p($citID);
    		$db=M('areas');
			$where=array('cityid'=>$citID);    		
    		$area=$db->where($where)->select();
    		if($area){
    			$this->ajaxReturn($area);
    		}
    	}else{
    		$this->error('非法请求');
    	}
    }
}