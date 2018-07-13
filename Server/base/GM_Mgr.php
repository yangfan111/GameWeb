<?php

//管理器
class GM_CMDMgr{

	private $handlerMap = array();//处理接口

	private $serverData; //服务器数据实例

	public  function register(){
		$this->handlerMap[ GMMsgCMD::GAME_SERVER_LIST]  = new GM_OpObject(
		array('classObj'=>'GM_OpObject','methodName'=>'handleGameServerListReq'),
		array('gameAppId'));
		$this->handlerMap[ GMMsgCMD::CHANGE_SERVER_STATE]  = new GM_OpObject(
		array('classObj'=>'GM_OpObject','methodName'=>'handleGameServerStateReq'),
		array('gameAppId','gameServerCode','gameServerState'));


	}
	function __construct(){
		$this->register();
		$this->serverData = new ServerData();
	}
	public function checkCMD($gmObject){
		if (!isset($this->handlerMap[$gmObject['action']]))
		return;
		//check action
		$handlerReqArgs = $this->handlerMap[$gmObject['action']]->argNames;
		$gmData = $gmObject['data'];
		//check data
		foreach ($handlerReqArgs as $argName)
		{
			if(!isset($gmData[$argName])){
				return;
			}
		}
		return true;
	}

	public  function handleGMCmd($gmObject)
	{
		$handlerObject = $this->handlerMap[$gmObject['action']] ;
		$res = $handlerObject->processFunc($gmObject['data'],$this);
		if(!isset($res)){
			return;
		}
		//TODO:执行完成后处理

	}
	public function initConfig(){
		$serverDataArr = Util::jsonFileDecode(API_ROOT . AppConst::SERVER_CONFIG);
		$this->serverData->initServerList($serverDataArr);
	}

}

//执行函数
class GM_CMDHandler
{

	public static function handleGameServerListReq($gmData,GM_Mgr $gm_Mgr){

	}
	public static function handleGameServerStateReq($gmData,GM_Mgr $gm_Mgr){

	}
}

// <?php

// //后台管理入口

// //框架配置
// $framework_config  = (object)array();

// //设置开始处理请求前的回调函数
// $framework_config->before_process_check_request_func = array("gm_mgr", "before_process_check_request");

// //设置请求处理完毕时的回调函数
// $framework_config->process_request_end_func = array("gm_mgr", "process_request_end");

// //框架入口
// require_once "index.php";


