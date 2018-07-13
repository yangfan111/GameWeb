<?php
/*
 * 全局常量
 */

class AppConst
{
	
		//游戏appId
	  const APP_ID = '';
	  const PRIVATE_KEY = '';
	  const APP_NOTE = '';
	  
	  //PATH
	  const SERVER_CONFIG = '/Config/ServerList.json';
	  
	 
	  
}


class ServerState
{
	 const NORMAL = 1;
	 const RECOMMAND =2;//正常
	 const HOT =3;//火爆
	 const MAINTAIN = 4;//维护中
	 const EXPECTATION =5; //异常
}
class GMMsgCMD
{

	 const GAME_SERVER_LIST = 'server_getGameServerList';
	 const CHANGE_SERVER_STATE = 'server_changeGameServerState';
	
}