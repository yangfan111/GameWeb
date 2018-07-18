<?php

class ServerData{

	//当前服务器列表
	public  $serverList =  array();

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
	function __construct($serverDataArr){
		if(count($this->serverList)>0)
		{
			unset($this->serverList);
		}
		//print_r($serverDataArr);
		foreach ($serverDataArr->ServerList as $serverData)
		{
		//	print_r($serverData);

			$this->serverList[$serverData->{'gameServerCode'}] = new ServerInfo($serverData);

		}
		//	print(count($this->serverList));
	}

}




