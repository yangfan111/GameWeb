<?php
class GM_Checker{

	public  function checkGMArgs($gmObject,GM_Mgr $gmMgr)
	{
		//TODO:添加checkresult

		if(!isset($gmObject->{'timestamp'})|| !isset($gmObject->{'sign'})||
		!isset($gmObject->{'action'})||!isset($gmObject->{'data'})||
		!is_object(($gmObject->{'data'}))){
			
			print_r('break in outside args');
			return;
		}
		//check action&data args
		return $gmMgr->checkCMD($gmObject);
			
	}

}




