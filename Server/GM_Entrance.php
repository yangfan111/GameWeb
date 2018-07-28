<?php
//gm入口

define('API_ROOT', dirname(__FILE__));
require_once API_ROOT . '/static/AppRegistry.php';

class GM_Entrance {
	/*TODO:
		 * 1.日志记录
		 * 2.性能记录
		 * 3.功能扩展
		 * 4.用户验证
		 * 5.SESSION处理
	*/

	private static $gm_Mgr; //gm管理器
	private static $gm_Checker; //gm验证
	private static $gm_Result; //gm结果处理
	private static $gm_Logger; //gm logger

	private static $initialize = false;
	//入口初始化
	public static function init() {

		AppRegistry::excute();
		self::$gm_Checker = new GM_Checker();
		self::$gm_Mgr = new GM_Mgr();
		self::$gm_Result = new GM_Result();
		self::$gm_Logger = new GM_Log();

	}
	public static function process($gmJson) {
		$gmObject = json_decode($gmJson);

		if (!self::$initialize) {
			self::$initialize = false;
			self::init();
		}

		if (!self::$gm_Checker->checkGMAcessState(self::$gm_Result)) {
			return array(
				'code' => $this->errObj->error_code,
				'message' => $this->errObj->error_msg,
				'data' => Util::anon_class(),
			);
		}
		self::$gm_Result->beforeExc(self::$gm_Logger, $gmJson);
		$processRet = self::realProcess($gmJson);
		//封装操作结果
		$finalResp = self::$gm_Result->wrapPostRet($processRet);
		$finalRespJson = json_encode($finalResp);
		self::$gm_Result->afterExc(self::$gm_Logger, $finalRespJson);

		return $finalRespJson;
	}
	//总流程控制
	private static function realProcess($gmJson) {

		$gmObject = json_decode($gmJson);

		if (!$gmObject) {

			self::$gm_Result->pushErrorCode(ErrorConst::REQUEST_JSON_INVALID);
			return;
		}

		$checkRet = self::$gm_Checker->checkGMArgs($gmObject, self::$gm_Mgr);
		if (is_a($checkRet, 'ErrorObject')) {

			self::$gm_Result->pushErrorObj($checkRet);
			return;
		}

		//echo($checkRet);
		//返回错误对象或数据
		$dataRet = self::$gm_Mgr->handleGMCmd($gmObject);
		//print_r('dataRet :%s',$dataRet);
		if (is_a($dataRet, 'ErrorObject')) {

			self::$gm_Result->pushErrorObj($dataRet);
			return;
		}
		return $dataRet;
		//$postData =	self::$gm_Result->wrapPostData($dataRet);
		//return json_encode($postData);

		//return json_encode($postData);
		//return self::$gm_Result->processResult($ret);

	}

}
