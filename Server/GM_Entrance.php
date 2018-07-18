<?php
//gm入口

define('API_ROOT', dirname(__FILE__));
require_once (API_ROOT.'/static/AppRegistry.php');

class GM_Entrance{
	/*TODO:
	 * 1.日志记录
	 * 2.性能记录
	 * 3.功能扩展
	 * 4.用户验证
	 * 5.SESSION处理
	 */

	private static $gm_Mgr;//gm管理器
	private static $gm_Checker;//gm验证
	private static $gm_Result;//gm结果处理
	private static $gm_Logger;//gm logger

	private static $initialize = false;
	//入口初始化
	public static function init(){

		AppRegistry::excute();
		self::$gm_Checker = new GM_Checker();
		self::$gm_Mgr = new GM_Mgr();
		self::$gm_Result= new GM_Result();
		self::$gm_Logger = new GM_Log();

	}

	//总流程控制
	public static function process($gmJson)
	{
		if(!self::$initialize)
		self::init();


		$gmObject = json_decode($gmJson);

		if(!$gmObject)
		{
			return;
		}
		if(!self::$gm_Checker->checkGMArgs($gmObject, self::$gm_Mgr))
		{
		
			return;
		}
		$dataRet = self::$gm_Mgr->handleGMCmd($gmObject);
		if(isset($dataRet))
		{
			$postData =	self::$gm_Result->wrapPostData($dataRet);
		}
		return json_encode($postData);
		//return self::$gm_Result->processResult($ret);

	}


}

