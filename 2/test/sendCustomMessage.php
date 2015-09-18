<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("../wechat.class.php");
$options = array();
$weObj = new Wechat($options);
$customData =  array(
                'touser' => 'o9po1uAqPgS8Hr2BsVPsQzAuaQNE',
                'msgtype' => 'news',
                'news' => array(
                    'articles' => array (
                        array('title' => '测试标题1', 'description' => "测试项目1的描述", 'url' => 'http://www.baidu.com/', 'picurl'=>'http://www.52mba.com/file_news/20122210278268.jpg'),
                        array('title' => '测试标题1', 'description' => "测试项目1的描述", 'url' => 'http://www.baidu.com/', 'picurl'=>'http://jsk.sanyue.com/userfiles/201011494947(1).jpg'),
                        array('title' => '测试标题1', 'description' => "测试项目1的描述", 'url' => 'http://www.baidu.com/', 'picurl'=>'http://res.fashion.ifeng.com/d39093c37ac8c664/2012/0104/rdn_4f03a5f2f2c23.jpg'),
                    )
                )
            );

$result = $weObj->sendCustomMessage($customData);

if($result) {
    echo 'create menu success';
} else {
    echo 'create menu failed';
    echo $weObj->errCode;
    echo $weObj->errMsg;
}
