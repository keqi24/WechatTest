<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("../wechat.class.php");

$options = array();
$weObj = new Wechat($options);
$newmenu =  array(
  		"button"=>
 			array(
 				array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
   				array('type'=>'view','name'=>'分享','url'=>'http://1.derekwechat.sinaapp.com/test/weshare.html'),
                                array('name'=>'菜单', 'sub_button' => 
                                     array(
                                         array('type'=>'view','name'=>'视频','url'=>'http://v.qq.com/'),
                                         array('type'=>'view','name'=>'搜索','url'=>'http://www.soso.com/'),
                                         array('type'=>'click','name'=>'测试','key'=>'MENU_KEY_TEST'),
                                     )
                                ),
                            )
		);
$result = $weObj->createMenu($newmenu);

if($result) {
    echo 'create menu success';
} else {
    echo 'create menu failed';
    echo $weObj->errCode;
    echo $weObj->errMsg;
}

