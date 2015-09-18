<?php
include "wechat.class.php";
$options = array(
//		'token'=>'tokenaccesskey' //填写你设定的key
	);
$weObj = new Wechat($options);
//$weObj->valid();
$type = $weObj->getRev()->getRevType();
$userId = "无所谓的疯狂";
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$result = 'hello,'. $weObj->getRev()->getRevFrom() . ", " .$weObj->getRev()->getRevContent();
			$weObj->text($result)->reply();
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
                        $arrayEvent = $weObj->getRev()->getRevEvent();
                        $eventResult = $arrayEvent['event'] . " : " . $arrayEvent['key'];
                        $weObj->text($eventResult)->reply();
			break;
	case Wechat::MSGTYPE_IMAGE:
                        $imageurl = $weObj->getRev()->getRevPic();
                        $weObj->text('hello, ' . $imageurl)->reply();    
			break;
	default:
                        $weObj->showNum();
			$result2 = 'hello, ' . $weObj->getRev()->getRevFrom() . $weObj->getRev()->getRevContent();
			$weObj->text($result2)->reply();
}