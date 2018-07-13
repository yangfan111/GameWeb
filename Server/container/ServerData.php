<?php

class ServerData{

	//当前服务器列表
	public  $serverList =  array();

	public  function getGMServerList()
	{
		$ret = array();
		foreach ($this->serverList as  $value) {
			$ret[] =$value->getGMObject();
		}
	
		return $ret;
	}

	function __construct($serverDataArr){
		if(count($this->serverList)>0)
		{
			unset($this->serverList);
		}
		foreach ($serverDataArr as $serverData)
		{
			array_push($serverList,new ServerInfo($serverData));
		}
	}
	
}




