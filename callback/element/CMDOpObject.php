<?php

    class CMDOpObject{

	//  public $cmdName;//命令
	public $methodName;//处理函数
	
	public $className;//静态实例
	public $classObj;//类实例 
	public $argNames;//参数列表
	public $tag;//命令tag
	function __construct($methodArr, $argNames,$tag) {
		Util::arrayToSpecificObject($methodArr, '',$this);
		$this->argNames = $argNames;
		$this->tag =$tag;
	} 

	public function call($argArr,AppMgr $mgr)
	{
		if(isset($this->classObj))
		{
			return Util::callObjMethod($this->classObj, $this->mehodName,array($argArr,$mgr),true);
		} 
		else{
			return Util::callStaticMethod($this->className, $this->methodName,array($argArr,$mgr),true);
		}	
		
	}	
	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]		
	 */							
	public function abc($a,$b){

	}
	

}

?>