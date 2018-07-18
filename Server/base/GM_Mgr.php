<?php

//管理器
class GM_Mgr{

	private $handlerMap = array();//处理接口

	public $serverData; //服务器数据实例

	public  function register(){
		$handlerClass = 'GM_CMDHandler';
		$this->handlerMap[ GMMsgCMD::GAME_SERVER_LIST]  = new GM_OpObject(
		array('className'=>$handlerClass,'methodName'=>'handleGameServerListReq'),
		array('gameAppId'));
		$this->handlerMap[ GMMsgCMD::CHANGE_SERVER_STATE]  = new GM_OpObject(
		array('className'=>$handlerClass,'methodName'=>'handleGameServerStateReq'),
		array('gameAppId','gameServerCode','gameServerState'));
		$this->handlerMap[ GMMsgCMD::TOGGLE_SERVER_FUNC]  = new GM_OpObject(
		array('className'=>$handlerClass,'methodName'=>'handleGameFunctionStateReq'),
		array('gameAppId','functionCode','state','defaultState','serverCodeList','channelCodeList'));
//		$this->handlerMap[ GMMsgCMD::TOGGLE_SERVER_FUNC]  = new GM_OpObject(
//		array('className'=>$handlerClass,'methodName'=>'handleGameFunctionStateReq'),
//		array('gameAppId','functionCode','state','defaultState','serverCodeList','channelCodeList'));



	}

	function __construct(){
		$this->register();
		$this->init();

	}
	public function checkCMD($gmObject){
		if (!isset($this->handlerMap[$gmObject->{'action'}]))
		{
			print_r('break in action args');
			return;
		}
		
		//check action
		$handlerReqArgs = $this->handlerMap[$gmObject->{'action'}]->argNames;
		$gmData = $gmObject->{'data'};
		//check data
		foreach ($handlerReqArgs as $argName)
		{
			if(!isset($gmData->{$argName})){
				print_r('break in data args');
				return;
			}
		}
		return true;
	}

	public  function handleGMCmd($gmObject)
	{
		$handlerObject = $this->handlerMap[$gmObject->{'action'}] ;
		$ret = $handlerObject->call($gmObject->{'data'},$this);
		if(!isset($ret)){
			print_r('break in handler');
			return;
		}
		
		return $ret;
		//TODO:执行完成后处理

	}
	public function init()
	{
		$this->initConfig();
	}

	private function initConfig(){

		$serverDataArr = Util::jsonFileDecode( dirname(dirname(__FILE__)). AppConst::SERVER_CONFIG);
		
		$this->serverData = new ServerData($serverDataArr);

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


