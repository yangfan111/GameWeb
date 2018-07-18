<?php
class Util{
	public static function arrayToObject($arr){
		
			if(is_array($arr))
			{
				return array_map(__FUNCTION__, $arr);	
			}else{
				return $arr;
			}
		
	}
	public static function objectToArray($obj)
	{
		$arr = is_object($obj) ?get_object_vars($obj):$obj;
		if(is_array($arr))
			return array_map(__FUNCTION__, $arr); 
		else 
			return $arr;
	}
	public static function arrayToSpecificObject($arr,$className,$classObj = null)
	{
		//动态创建类型
		if(!isset($classObj))
			$classObj = new $className;
		foreach ($arr as $key => $value)
		{
			$classObj->{$key} = $value;
		}
		return $classObj;
	}
	//file to  decode array
	public static function jsonFileDecode($filePath)
	{
	  $fileRawData = file_get_contents($filePath);	
	  return json_decode($fileRawData);
	}
	/**
	 * @param  	
	 * @return [type]
	 */
	public static function getFunctionReflectInfo($funcRef)
	{
	 	$funcReflection = new \ReflectionFunction($funcRef);	
	}
	//Note that the parameters for call_user_func are  not passed by reference.
	public static function callObjMethod($obj,$methodName,$argArr,$isMulArg = false)
	{
		if($isMulArg)
		{
			return call_user_method_array(array($className,$methodName),$argArr );	
		}
		else{
			return call_user_method(array($className,$methodName),$argArr );	
		}
		
	}
	public static function callStaticMethod($className,$methodName,$argArr,$asMutiplyArg = false)
	{
		if($asMutiplyArg)
		{
			return forward_static_call_array(array($className,$methodName),$argArr);
		}
		else {
			return forward_static_call(array($className,$methodName),$argArr);
		}
	}
	

}	

