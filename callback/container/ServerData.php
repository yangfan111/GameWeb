<?php

class ServerData{



	public  $serverList =  array();
	//当前服务器列表
	public  $channelList =  array();
	public  function getGMServerList($channel = 'channel_DEV')
	{
		
		$gmSrvArr = array();
		$tarServerList=array();
		if(isset($this->channelList[$channel]))
		{
			$tarServerList= $this->channelList[$channel]->{'include'};
		}
	
		foreach ($tarServerList as $key) {
			# code...
			array_push($gmSrvArr,$this->serverList[$key]->getGMObject());
		}
		//没有为空列表
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
		

		foreach ($serverDataArr->ServerList as $serverData)
		{
	

			$this->serverList[$serverData->{'gameServerCode'}] = new ServerInfo($serverData);

		}
		foreach ($serverDataArr->ChannelList as $channelData)
		{
	

			$this->channelList[$channelData->{'name'}] = $channelData;

		}
		//	print(count($this->serverList));
	}

}




