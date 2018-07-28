<?php

class MessageData {

	//当前服务器列表
	public $messageList = array();

	public function getGMServerList() {

		$gmSrvArr = array();

		foreach ($this->serverList as $key => $value) {

			array_push($gmSrvArr, $value->getGMObject());
		}
		return $gmSrvArr;
	}
	public function changeServerState($serverCode, $tarServerState) {
		if (!isset($this->serverList[$serverCode])) {
			return;
		}
		$this->serverList[$serverCode]->gameSerpverState = $tarServerState;
		return true;
	}
	function __construct($messageDataArr) {
		if (count($this->messageList) > 0) {
			unset($this->messageList);
		}
		//print_r($serverDataArr);
		foreach ($messageDataArr->messages as $messageData) {

			$this->messageList[$messageData->{'messageId'}] = new MessageInfo($messageData);

		}
		//	print(count($this->serverList));
	}
	function ModifyMessage($gmData) {
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

}
