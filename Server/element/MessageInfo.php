<?php

/*
 * 账号平台数据库配置
 */
class MessageInfo extends GMEntry
{
	//数据库ip
	public  $gameAppId = AppConst::APP_ID;
	//游戏服务器编号
	public  $messageId;
	//游戏服务器名字
	public  $messageName;
	
	public $gameServerCode;
	
	public $publishTypeCode;
	
	public $receiveType;
	
	public $startTime;
	
	
 	public $isGlobalSync;
	
	public $messageBodyList;//消息体列表
	
	public $hasUserList;
	
	//optional 
	public $intervalDay;
	public $endTime;
	public $messageDetailUrl;
	public $itemList;
	public $serverCodeList;
	public $channelCodeList;
	public $playerCount;
	public $filePath;
	function getCltObject($langId)
	{	

		return array(
			'messageName'=>$this->messageName,
			'messageBody'=>$this->_findLangBody($langId)
		);

	}
	private function _findLangBody($langId)
	{
		foreach ($this->messageBodyList as $value) {
			if($value->{'languageID'} == $langId)
			{
				return $value; 
			}
		}
		
	}
	
//	function getGMObject(){
//	  return array(
//		
//			'gameServerCode'=>$this->gameServerCode,
//			'gameAppId'=> $this->gameAppId,
//			'gameServerName'=> $this->gameServerName,
//			'gameServerState'=> $this->gameServerState,
//		);
//	}


	
}


