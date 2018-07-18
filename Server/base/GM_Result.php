<?php
class GM_Result{
	public $errObj;
	private $webLockTag = false;

	public function wrapPostRet($processRet)
	{
		if(!isset($processRet) || is_bool($processRet))
			$processRet = Util::anon_class();

		$resp = array(
			'code'=>$this->errObj->error_code,
			'message'=>$this->errObj->error_msg,
			'data'=>$processRet,
		);
		return $resp;
	}
	public function beforeExc(){
		$this->webLockTag = true;
		$this->errObj = ErrorObject::genErr(1);
	}
	public function afterExc()
	{
		$this->webLockTag = false;
		$this->errObj = null;
	}
	public function checkResultState(){
		return($this->webLockTag == false);
	}
	public function pushErrorCode($ecode)
	{
		$this->errObj = ErrorObject::genErr($ecode);
		//print_r($this->errObj);

	}
	public function pushErrorObj($eobj)
	{
		$this->errObj = $eobj;
		//		print_r('come in 222');
		//		print_r($this->errObj);
	}
	public function __print()
	{
		print_r($this->errObj);
	}


}