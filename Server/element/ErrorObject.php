<?php

/*
 * api结果数据类
 */
class ErrorObject
{
	//错误号
	public $error_code;

	//错误信息(根据错误号自动获取)
	public $error_msg;

	/*sa
	 * @param {int} $code 错误码
	 * @param {boolean} $use_error_map 是否使用错误码集中的数据，默认使用
	 */
	function __construct($code) {
		$this->error_code = $code;


		if (isset(ErrorConst::$error_map[$code]))
			$this->error_msg = ErrorConst::$error_map[$code];
		else
			$this->error_msg = "";

	}

	function __tostring() {


		return $this->toString();
	}
	function toString()
	{


		return json_encode($this);
	}
	public static function genErr($code)
	{
		return new ErrorObject($code);
	}
}

/*
 * 错误码集
 */
class ErrorConst
{
	const SYSTEM_ERROR = -1;							//系统错误
	const SYSTEM_GET_PLATFORM_DB_ERROR = -2;			//系统错误，获取平台数据库失败
	const SE_DB_HANDLER_ERROR = -3;						//系统错误，数据库操作失败
	const SE_DB_TRANSACTION_ERROR = -4;					//系统错误，数据库事务执行失败
	const SE_LOAD_GAME_SERVER_LIST_ERROR = -5;			//系统错误，加载服务器列表失败
	const SE_CONNECT_GAME_SERVER_DB_ERROR = -6;			//系统错误，连接游戏服务器数据库失败
	const SE_CONNECT_GAME_GIFT_DB_ERROR = -7;			//系统错误，连接游戏礼包数据库失败
	const SE_LOAD_GAME_RECHARGE_LIST_ERROR = -8;		//系统错误，加载游戏充值列表失败


	
	const SUCCEED = 1;									//成功
	const DATA_ILLEGAL = 2;								//数据非法
	const INVALID_REQUEST_TYPE = 3;						//无效的请求类型
	const REQUEST_PARAM_BASIC_LESS = 4;						//请求类型的参数不足
	
	const REQUEST_JSON_INVALID = 5;						//请求的数据执行出错
	const REQUEST_CMD_EXCUTE_ERROR = 6;
	const REQUEST_PARAM_DATA_LESS = 7;						//请求类型DATA的参数不足
	const NEED_LOGIN_FIRST = 101;						//需要先登录
	const ALREADY_LOGIN = 102;							//已登录
	const ALREADY_LOGIN_NOT_REGISTER = 103;				//已登录，不能注册
	const USERNAME_ALREADY_EXIST = 104;					//用户名已存在
	const USERNAME_IS_INVALID = 105;					//无效的用户名
	const PASSWORD_IS_INVALID = 106;					//无效的密码
	const CHANNEL_INVALID = 107;						//无效的渠道
	const UNKNOW_GAME_ID = 108;							//未知的游戏
	const NOT_FIND_USERNAME = 109;						//用户不存在
	const USERNAME_OR_PASSWORD_ERROR = 110;				//用户名或密码错误
	const PASSWORD_NEW_AND_OLD_CANNOT_BE_SAME = 111;	//新密码和老密码不能相同
	const USERNAME_NEW_AND_OLD_CANNOT_BE_SAME = 112;	//新用户名和老用户名不能相同
	const SERVER_ID_IS_INVALID = 113;					//无效的服务器id
	const GIFT_CODE_IS_INVALID = 114;					//无效的礼包码
	const GIFT_CODE_ALREADY_USED = 115;					//礼包码已被使用过
	const GIFT_CODE_TYPE_CANT_NOT_GET = 116;			//不能重复领取该类型礼包
	const THE_GAME_DO_NOT_USE_USER_RECHARGE = 117;		//当前游戏不能使用用户充值，请进行付费充值
	const USER_RECHARGE_RMB_VALUE_INVALID = 118;		//用户充值时，无效的金额
	const USER_RECHARGE_UNKNOW_ERROR = 119;				//用户充值时，未知的错误
	const USER_NOT_IS_GM = 120;							//不是gm账号
	const GM_USER_LOGIN_IP_NOT_ALLOW = 121;				//gm登录时，ip不被允许
	const NOT_FIND_ACCOUNTID_BY_CHAR_DBID = 122;		//找不到角色dbid对应的账号id
	const PAY_ORDERID_ALREADY_EXIST = 123;				//支付时，订单号已存在
	const PAY_UNKNOW_ERROR = 124;						//支付时，未知的错误
	const PAY_RMB_VALUE_INVALID = 125;					//支付时，无效的金额(找不到金额对应的充值配置)
	const PAY_PRIVATE_DATA_ERROR = 126;					//支付方传递的游戏私有信息错误
	const PAY_PRIVATE_DATA_DECODE_FROM_JSON_ERROR = 127;//支付方传递的私有信息从json解析为对象失败
	const PAY_APPID_NOT_EQ_GAME_ID_FOR_APPID = 128;		//支付方传递的appid和游戏标识所查到的appid不相等
	const PAY_IP_NOT_IN_WHITE_LIST = 129;				//支付方当前ip不在白名单中
	const PAY_SIGN_CHECK_FAILED = 130;					//支付方支付签名验证失败



	//错误号与消息的映射
	public static $error_map = array(
		self::SYSTEM_ERROR => '系统错误',
		self::SYSTEM_GET_PLATFORM_DB_ERROR => '系统错误，获取平台数据库失败',
		self::SE_DB_HANDLER_ERROR => '系统错误，数据库操作失败',
		self::SE_DB_TRANSACTION_ERROR => '系统错误，数据库事务执行失败',
		self::SE_LOAD_GAME_SERVER_LIST_ERROR => '系统错误，加载服务器列表失败',
		self::SE_CONNECT_GAME_SERVER_DB_ERROR => '系统错误，连接游戏服务器数据库失败',
		self::SE_CONNECT_GAME_GIFT_DB_ERROR => '系统错误，连接游戏礼包数据库失败',
		self::SE_LOAD_GAME_RECHARGE_LIST_ERROR => '系统错误，加载游戏充值列表失败',
		
		
		self::SUCCEED => '成功',
		self::DATA_ILLEGAL => '数据非法',
		self::INVALID_REQUEST_TYPE => '未处理的请求类型',
		self::REQUEST_PARAM_BASIC_LESS => '请求类型的必须参数不足',
		self::REQUEST_PARAM_DATA_LESS => '请求类型的DATA必须参数不足',
		
		self::REQUEST_JSON_INVALID => '请求的json结构解析出错',
		self::REQUEST_CMD_EXCUTE_ERROR => '请求的命令数据执行出错',
		
		self::NEED_LOGIN_FIRST => '需要先登录',
		self::ALREADY_LOGIN => '已登录',
		self::ALREADY_LOGIN_NOT_REGISTER => '已登录，不能注册',
		self::USERNAME_ALREADY_EXIST => '用户名已存在',
		self::USERNAME_IS_INVALID => '无效的用户名',
		self::PASSWORD_IS_INVALID => '无效的密码',
		self::CHANNEL_INVALID => '无效的渠道',
		self::UNKNOW_GAME_ID => '未知的游戏',
		self::NOT_FIND_USERNAME => '用户不存在',
		self::USERNAME_OR_PASSWORD_ERROR => '用户名或密码错误',
		self::PASSWORD_NEW_AND_OLD_CANNOT_BE_SAME => '新密码和老密码不能相同',
		self::USERNAME_NEW_AND_OLD_CANNOT_BE_SAME => '新用户名和老用户名不能相同',
		self::SERVER_ID_IS_INVALID => '无效的服务器id',
		self::GIFT_CODE_IS_INVALID => '无效的礼包码',
		self::GIFT_CODE_ALREADY_USED => '礼包码已被使用过',
		self::GIFT_CODE_TYPE_CANT_NOT_GET => '不能重复领取该类型礼包',
		self::THE_GAME_DO_NOT_USE_USER_RECHARGE => '当前游戏不能使用用户充值，请进行付费充值',
		self::USER_RECHARGE_RMB_VALUE_INVALID => '用户充值时，无效的金额',
		self::USER_RECHARGE_UNKNOW_ERROR => '用户充值时，未知的错误',
		self::USER_NOT_IS_GM => '不是gm账号',
		self::GM_USER_LOGIN_IP_NOT_ALLOW => 'gm登录时，ip不被允许',
		self::NOT_FIND_ACCOUNTID_BY_CHAR_DBID => '找不到角色dbid对应的账号id',
		self::PAY_ORDERID_ALREADY_EXIST => '支付时，订单号已存在',
		self::PAY_UNKNOW_ERROR => '支付时，未知的错误',
		self::PAY_RMB_VALUE_INVALID => '支付时，无效的金额(找不到金额对应的充值配置)',
		self::PAY_PRIVATE_DATA_ERROR => '支付方传递的游戏私有信息错误',
		self::PAY_PRIVATE_DATA_DECODE_FROM_JSON_ERROR => '支付方传递的私有信息从json解析为对象失败',
		self::PAY_APPID_NOT_EQ_GAME_ID_FOR_APPID => '支付方传递的appid和游戏标识所查到的appid不相等',
		self::PAY_IP_NOT_IN_WHITE_LIST => '支付方当前ip不在白名单中',
		self::PAY_SIGN_CHECK_FAILED => '支付方支付签名验证失败',
	);
}


