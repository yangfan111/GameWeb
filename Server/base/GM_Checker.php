<?php
class GM_Checker{

	public  function checkGMArgs($gmObject,GM_Mgr $gmMgr)
	{
		//TODO:添加checkresult

		if(!isset($gmObject->{'timestamp'})|| !isset($gmObject->{'sign'})||
		!isset($gmObject->{'action'})||!isset($gmObject->{'data'})||
		!is_object(($gmObject->{'data'}))){
			
			
			return ErrorObject::genErr(ErrorConst::REQUEST_PARAM_BASIC_LESS);
		}
		//check action&data args
		return $gmMgr->checkCMD($gmObject);
			
	}
	public function checkGMAcessState(GM_Result $gmResult)
	{
		return true;
	//	return $gmResult->checkResultState();
	}

}




