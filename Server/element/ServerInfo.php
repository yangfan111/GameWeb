<?php

/*
 * 账号平台数据库配置
 */
class ServerInfo extends GMEntry
{
	//数据库ip
	public  $gameAppId = AppConst::APP_ID;

	//游戏服务器编号
	public  $gameServerCode;

	//游戏服务器名字
	public  $gameServerName;

	public  $url;
	//游戏服务器状态
	public  $gameServerState = ServerState::NORMAL;
//	function __construct($serverData) {
//		
//		$this->gameServerCode = $serverData->gameServerCode;
//		$this->gameServerName = $serverData->gameServerName;
//		$this->url = $serverData->url;
//
//	}
	function getGMObject(){
	  return array(
		
			'gameServerCode'=>$this->gameServerCode,
			'gameAppId'=> $this->gameAppId,
			'gameServerName'=> $this->gameServerName,
			'gameServerState'=> $this->gameServerState,
		);
	}


	
}


