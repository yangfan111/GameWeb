<?php

class MessageData {

	//当前服务器列表
	public $messageList = array();
	function __construct($messageDataArr) {
	
		//print_r($serverDataArr);
		foreach ($messageDataArr->messages as $messageData) {

			$this->messageList[$messageData->{'messageId'}] = new MessageInfo($messageData);

		}
		//	print(count($this->serverList));
	}
	public  function getGMMessageList()
	{
		
		$gmMsgArr = array();

		foreach ($this->messageList as $key =>$value) {

			array_push($gmMsgArr, $value->getGMObject());
		}
		return $gmMsgArr;
	}
	public function getCltMessageList($langId)
	{
		$gmMsgArr = array();

		foreach ($this->messageList as $key =>$value) {
			$msgObj = $value->getCltObject($langId);
			if(isset($msgObj['messageBody']))
				array_push($gmMsgArr, $msgObj);
		}
		return $gmMsgArr;
	}
	public function modifyMessage($gmData) {
		$msgId = $gmData->{'messageId'};
		$msgInfo = null;
		//添加或替换文件
		if (isset($this->messageList[$msgId])) {
			$msgInfo = $this->messageList[$msgId];
			$msgInfo->modify($gmData);
		} else {
			$msgInfo = new MessageInfo($gmData);
			array_push($this->messageList, $msgInfo);
		}
		$anonObj = Util::anon_class();

		//array_filter array_value
		$messageSafeArr = array_map(function ($element) {
			return $element->getGMObject();
		}, $this->messageList);

		$anonObj->{'messages'} = array_values($messageSafeArr);
		//var_dump($anonObj);
		Util::jsonFileEncode($anonObj, dirname(dirname(__FILE__)) . AppConst::MESSAGE_CONFIG);
		//echo(json_encode($this->messageList));
		return true;
	}
	public function deleteMessage($gmData)
	{
		$msgId = $gmData->{'messageId'};
		
		if (isset($this->messageList[$msgId])) {
			
			unset($this->messageList[$msgId]);
			
			$anonObj = Util::anon_class();
		//array_filter arwwray_value
			$messageSafeArr = array_map(function ($element) {
				return $element->getGMObject();
			}, $this->messageList);
		
			$anonObj->{'messages'} = count($messageSafeArr)>0? array_values($messageSafeArr):array();
		//var_dump($anonObj);
			Util::jsonFileEncode($anonObj, dirname(dirname(__FILE__)) . AppConst::MESSAGE_CONFIG);



		}
		return true;

	}

}
