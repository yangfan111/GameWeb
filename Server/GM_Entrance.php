<?php
//gm入口
define('API_ROOT', dirname(__FILE__));
    class GM_Entrance{

		
    	private static $gm_Mgr;
    	private static $gm_Checker;
		//入口初始化
        public static function init(){
            self::$gm_Mgr = new GM_CMDMgr();
            self::$gm_Checker = new GM_Checker();
           	self::$gm_Mgr->initConfig();
           
            
        }

		//json命令执行
        public function process($gmJson)
        {
      	
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

   
           GM_CMDMgr::handleGMCmd($gmObject);

        }
     

    }

