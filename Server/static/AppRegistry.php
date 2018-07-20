<?php
//TODO: session_start();
define('CLASS_ROOT', dirname(dirname(__FILE__)));
require_once (CLASS_ROOT.'/static/AppScriptLoader.php');



class AppRegistry
{
	private static $registryInit = false;

	public static function excute()
	{
		if(!self::$registryInit)
		{	
			self::$registryInit = true;
			$classArr	=  array(
				'GM_Checker' => CLASS_ROOT.'/base/GM_Checker.php',
				'GM_Log' =>CLASS_ROOT.'/base/GM_Log.php',
				'GM_Mgr'=>CLASS_ROOT.'/base/GM_Mgr.php',
				'GM_CMDHandler'=>CLASS_ROOT.'/base/GM_CMDHandler.php',
	    		'GM_Result'=>CLASS_ROOT.'/base/GM_Result.php',

			//container
				'ServerData' =>CLASS_ROOT.'/container/ServerData.php',
				'MessageData' =>CLASS_ROOT.'/container/MessageData.php',
				'ErrorObject'=>CLASS_ROOT.'/element/ErrorObject.php',
				'ErrorConst'=>CLASS_ROOT.'/element/ErrorObject.php',
				'GM_OpObject'=>CLASS_ROOT.'/element/GM_OpObject.php',
				'ServerInfo'=>CLASS_ROOT.'/element/ServerInfo.php',
					//static
				'AppConst'=>CLASS_ROOT.'/static/AppConst.php',
				//'GMMsgCMD'=>CLASS_ROOT.'/static/AppConst.php',	
				'GM_MessageType'=>CLASS_ROOT.'/static/AppConst.php',
				'GM_MessageRecType'=>CLASS_ROOT.'/static/AppConst.php',
				'GM_GlobalType'=>CLASS_ROOT.'/static/AppConst.php',
				'GMEntry'=>CLASS_ROOT.'/element/GMEntry.php',
				'MessageInfo'=>CLASS_ROOT.'/element/MessageInfo.php',
				'ItemInfo'=>CLASS_ROOT.'/element/ItemInfo.php',
				'MessageBodyInfo'=>CLASS_ROOT.'/element/MessageBodyInfo.php',
				'ServerState'=>CLASS_ROOT.'/static/AppConst.php',	
				'AppRegistry'=>CLASS_ROOT.'/static/AppRegistry.php',
				'AppScriptLoader'=>CLASS_ROOT.'./static/AppScriptLoader.php',
				'Util'=>CLASS_ROOT.'/static/Util.php',
			
				'Distribution'=>CLASS_ROOT.'/Distribution.php',
				'GM_Entrance'=>CLASS_ROOT.'/GM_Entrance.php',
		);

		AppScriptLoader::registerClass($classArr);
		}

	}
	

}


