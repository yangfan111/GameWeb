<?php
//gm入口
define('API_ROOT', dirname(__FILE__));
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

		self::$gm_Checker = new GM_Checker();
		self::$gm_Mgr = new GM_CMDMgr();
		self::$gm_Result= new GM_Result();
		self::$gm_Logger = new GM_Log();

	}

	//总流程控制
	public static function process($gmJson)
	{
		if(!$initialize)
			self::init();
		$gmObject = json_decode($gmJson);
		if(!$gmObject)
		{
			//TODO:添加checkresult
			return;
		}
		if(!self::$gm_Checker->checkGMArgs($gmObject, $gmMgr))
		{
			return;
		}

			
		$ret = self::$gm_Mgr->handleGMCmd($gmObject);

		return self::$gm_Result->processResult($ret);

	}


}

