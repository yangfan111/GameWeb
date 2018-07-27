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
		return $this->checkGMActionArgs($gmObject, $gmMgr);
			
	}
	private function checkGMActionArgs($gmObject,GM_Mgr $gmMgr)
	{
		$mgr_handlerMap = $gmMgr->handlerMap;
		if (!isset($mgr_handlerMap[$gmObject->{'action'}]))
		{
			//print_r('break in action args');
			return ErrorObject::genErr(ErrorConst::INVALID_REQUEST_TYPE);
		}

		//check action
		$handlerReqArgs = $mgr_handlerMap[$gmObject->{'action'}]->argNames;
		$gmData = $gmObject->{'data'};
		//check data
		foreach ($handlerReqArgs as $argName)
		{
			if(!isset($gmData->{$argName})){
				//print_r('break in data args');
				return ErrorObject::genErr(ErrorConst::REQUEST_PARAM_DATA_LESS);
			}
		}
		return true;
	}
	public function checkGMAcessState(GM_Result $gmResult)
	{
		return true;
	//	return $gmResult->checkResultState();
	}

}




