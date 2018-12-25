<?php

namespace Index\Controller;

use Think\Controller;
use Think\Image;

class PictureController extends Controller {
	public function index() {
		
		// $image=new Image();
		
		// $image->water($source);
		
		// 1.打开一张图片
		// 2.生成二维码图片
		
		// 3.二维码图片制作水印	
		                      
		// 生成二维码图片
		
		Vendor ( 'phpqrcode.phpqrcode' );
		
		\QRcode::png ( 'helloworld', './Public/qrcode/qrcode.png', 'H', 10, 2 );
		$bg="./Public/bgImg/qrbg.png";
		
		$image=new Image();
		$image->open($bg);
		
		$imgname="./Public/water.png";
		$image->water('./Public/qrcode/qrcode.png')->save($imgname);
		
		
		echo "图片已经生成";
	}
}