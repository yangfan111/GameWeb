<?php
/*
 * 全局常量
 */

class AppConst {

	//游戏appId
	const APP_ID = 8006;
	const PRIVATE_KEY = '6b525b0d2144dcffeb7540aa0ed1c649';
	const APP_NOTE = '';

	//PATH
	const SERVER_CONFIG = '/config/serverList.json';
	const GM_CMD_CONFIG = '/config/gmCmdArgs.json';
	const MESSAGE_CONFIG = '/config/messageList.json';
	const GM_HANDLER_CLASS = 'GM_CMDHanlder';
	const LOG_IO = '/log/io';
	const LOG_FLAG_INPUT = 'Request';
	const LOG_FLAG_OUTPUT = 'Response';

}

class GM_MessageType {
	const MSG_SDK = 1; //游戏外SDK公告
	const MSG_USER_MAIL = 2; //邮件
	const MSG_GAME_MAIL = 9; //游戏内邮件
	const MSG_GAME = 10; //游戏内公告
}
class GM_MessageRecType {
	const ONCE = 1;
	const LOGIN_TIME = 2; //登录时收到
	const EVERY_DATA = 3; //每天一次
}
class GM_GlobalType {
	const YES = 1;
	const NO = 2;
}
class ServerState {
	const NORMAL = 1;
	const RECOMMAND = 2; //正常
	const HOT = 3; //火爆
	const MAINTAIN = 4; //维护中
	const EXPECTATION = 5; //异常
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