<?php
    class GM_OpObject{

	//  public $cmdName;//命令
	public $methodName;//处理函数
	public $className;//类实例
	public $classObj;//静态实例
	public $argNames;//参数列表
	function __construct($methodArr, $argNames) {
		Util::arrayToSpecificObject($methodArr, '',$this);
		$this->argNames = $argNames;
	}
	public function call($argArr)
	{
		if(isset($this->classObj))
		{
			Util::callInstanceMethod($this->classObject, $this->methodName,$argArr);
		}
		else{
			Util::callStaticMethod($this->className, $this->$methodName, $argArr);
		}
	}

}

?>