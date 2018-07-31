<?php
//执行函数
class GM_CMDHandler
{
	/**
	 * @param $gmData
	 * @param $gm_Mgr
	 * @return 成功返回data object对象或者true
	 * 失败返回空值
	 */
	public static function handle_server_changeGameServerState($gmData,GM_Mgr $gm_Mgr){
		return $gm_Mgr->serverData->changeServerState($gmData->{'gameServerCode'},
		$gmData->{'gameServerState'});
	}

	public static function handle_server_getGameServerList($gmData,GM_Mgr $gm_Mgr){
		

		$anonObj = Util::anon_class();
		$anonObj->{'gameServerList'} = $gm_Mgr->serverData->getGMServerList();
		return $anonObj;
	}
	public static function handle_message_push($gmData,GM_Mgr $gm_Mgr)
	{
		//$anonObj = Util::anon_class();
		return $gm_Mgr->messageData->modifyMessage($gmData);
	}
	public static function handle_message_disable($gmData,GM_Mgr $gm_Mgr)
	{

		return $gm_Mgr->messageData->deleteMessage($gmData);
	}
	public static function handle_clientWebData($gmData,GM_Mgr $gm_Mgr)
	{
		$anonObj = Util::anon_class();
		$anonObj->{'gameServerList'} = $gm_Mgr->serverData->getGMServerList();
		$anonObj->{'gameMessageList'} =  $gm_Mgr->messageData->getGMMessageList();
		return $anonObj;
	}
}