<?php
//执行函数
class GM_CMDHandler
{

	
	public static function handleGameServerListReq($gmData,GM_Mgr $gm_Mgr){
		return $gm_Mgr->serverData->getGMServerList();

		

	}
	

	public static function handleGameServerStateReq($gmData,GM_Mgr $gm_Mgr){
	}
	public static function handleGameFunctionStateReq($gmData,GM_Mgr $gm_Mgr)
	{

	}

}