<?php

class ServerData{

	//当前服务器列表
	public  $serverList =  array();

	public  function getGMServerList()
	{
		$gmSrvArr = array();
		foreach ($this->serverList as  $value) {

			array_push($gmSrvArr, $value->getGMObject());
		}
		return $gmSrvArr;
	}

	function __construct($serverDataArr){
		if(count($this->serverList)>0)
		{
			unset($this->serverList);
		}
		//print_r($serverDataArr);
		foreach ($serverDataArr->ServerList as $serverData)
		{
			//print_r($serverData);
			array_push($this->serverList,new ServerInfo($serverData));
		}
	//	print(count($this->serverList));
	}
	
}




