<?php
    class GM_Checker{

        public  function checkGMArgs($gmObject,GM_CMDMgr $gmMgr)
        {
        	//TODO:添加checkresult
            if(!isset($gmObject['timeStamp'])|| !isset($gmObject['sign'])||
            	!isset($gmObject['action'])||!isset($gmObject['data'])||
            	!is_object(($gmObject['data']))){
                 return;
            	}
              //check action&data args 
          	return $gmMgr->checkCMD($gmObject);
           
        }
   		
    }

