<?php

//管理器
class AppMgr{

	public $handlerMap = array();//处理接口
	
	
	public $serverData; //服务器数据实例

	public $messageData;//消息实例

	public  function register(){
		$cmdConfigObj = Util::jsonFileDecode( dirname(dirname(__FILE__)). AppConst::GM_CMD_CONFIG);

		$cmd_gmArgsObj = $cmdConfigObj->gm;
		$cmd_cltArgsObj = $cmdConfigObj->client;

		$handlerClass = 'AppCMDHandler';
		foreach ($cmd_gmArgsObj as $key => $value) {
			$this->handlerMap[$key] = new CMDOpObject(
			array('className'=>$handlerClass,'methodName'=>
					'handle_'.$key),$value,'gm');
		}
		foreach ($cmd_cltArgsObj as $key => $value) {
			$this->handlerMap[$key] = new CMDOpObject(
			array('className'=>$handlerClass,'methodName'=>
					'handle_'.$key),$value,'clt');
		}
	}

	function __construct(){
		$this->register();
		$this->init();

	}
//	public function checkCMD($gmObject){
//		if (!isset($this->handlerMap[$gmObject->{'action'}]))
//		{
//
//			//print_r('break in action args');
//			return ErrorObject::genErr(ErrorConst::INVALID_REQUEST_TYPE);
//		}
//
//		//check action
//		$handlerReqArgs = $this->handlerMap[$gmObject->{'action'}]->argNames;
//		$gmData = $gmObject->{'data'};
//		//check data
//		foreach ($handlerReqArgs as $argName)
//		{
//			if(!isset($gmData->{$argName})){
//				//print_r('break in data args');
//				return ErrorObject::genErr(ErrorConst::REQUEST_PARAM_DATA_LESS);
//			}
//		}
//		return true;
//	}
	/*
	 * @return 成功 ：数据结构 |失败：ErrorObject
	 * @param unknown_type $gmObject
	 */
	public  function handleGMCmd($gmObject)
	{
		$handlerObject = $this->handlerMap[$gmObject->{'action'}] ;
		//成功返回data object || true,失败返回空值
		$ret = $handlerObject->call($gmObject->{'data'},$this);
		if(!isset($ret)){
			return ErrorObject::genErr(ErrorConst::REQUEST_CMD_EXCUTE_ERROR);
		}

		return $ret;


	}
	public function init()
	{
		$this->initConfig();
	}

	private function initConfig(){

		$dataArr = Util::jsonFileDecode( dirname(dirname(__FILE__)). AppConst::SERVER_CONFIG);
	//	print('AAAAAAA'.(string)$dataArr);
		$this->serverData = new ServerData($dataArr);
		$dataArr =  Util::jsonFileDecode( dirname(dirname(__FILE__)). AppConst::MESSAGE_CONFIG);
		$this->messageData = new MessageData($dataArr);

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


