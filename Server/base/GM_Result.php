<?php
class GM_Result{
	
	public  function wrapPostData($dataRet)
	{
		if(!isset($dataRet))
			throw new Exception('dataResult is empty');
		$retArr = array(
			'code'=>1,
			'message'=>'',
			'data'=>$dataRet,
		);
		return $retArr;
		
	}
	

}