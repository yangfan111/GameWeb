<?php
/*
 * 全局常量
 */

class AppConst
{
	
		//游戏appId
	  const APP_ID = 8006;
	  const PRIVATE_KEY = '6b525b0d2144dcffeb7540aa0ed1c649';
	  const APP_NOTE = '';
	  
	  //PATH
	  const SERVER_CONFIG = '/config/serverList.json';
	  const GM_CMD_CONFIG = '/config/gmCmdArgs.json';
	  const GM_HANDLER_CLASS = 'GM_CMDHanlder';
	   
	 
	  
}


class ServerState
{
	 const NORMAL = 1;
	 const RECOMMAND =2;//正常
	 const HOT =3;//火爆
	 const MAINTAIN = 4;//维护中
	 const EXPECTATION =5; //异常
}
// class GMMsgCMD
// {
// 	//服务器管理
// 	 const GAME_SERVER_LIST = 'server_getGameServerList';
// 	 const CHANGE_SERVER_STATE = 'server_changeGameServerState';
// 	 //功能管理
// 	 const TOGGLE_SERVER_FUNC = 'func_changeGameServerState';
	
	
// }
?>