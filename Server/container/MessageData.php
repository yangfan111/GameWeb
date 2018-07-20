<?php

class MessageData{

	//当前服务器列表
	public  $messageList =  array();

	public  function getGMServerList()
	{
		
		$gmSrvArr = array();

		foreach ($this->serverList as $key =>$value) {

			array_push($gmSrvArr, $value->getGMObject());
		}
		return $gmSrvArr;
	}
	public function changeServerState($serverCode,$tarServerState)
	{
		if(!isset($this->serverList[$serverCode]))
		{
			return;
		}
		$this->serverList[$serverCode]->gameSerpverState =$tarServerState;
		return true;
	}
	function __construct($messageDataArr){
		if(count($this->messageList)>0)
		{
			unset($this->messageList);
		}
		//print_r($serverDataArr);
		foreach ($messageDataArr->messages as $messageData)
		{
		//	print_r($serverData);

			$this->messageList[$messageData->{'messageId'}] = new MessageInfo($serverData);

		}
		//	print(count($this->serverList));
	}

}




