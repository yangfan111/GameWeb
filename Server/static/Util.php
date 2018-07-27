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
	//不同对象深克隆
	public static function objectDeepClone($objSrc,$objTar)
	{
		foreach ($objSrc as $key => $value)
		{
			$objTar->{$key} = $value;
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
	public static function jsonFileEncode($fileData,$filename)
	{
		$fileJsonData = json_encode($fileData);
		file_put_contents($filename, $fileJsonData);
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
	/**
	 * @DateTime 2018-07-27
	 * @Desc     匿名函数类
	 */
	public static function anon_class()
	{
    	return new stdClass();
	}
	/**
	 * @DateTime 2018-07-27
	 * @Desc     平台通用创建文件夹
	 * @return   [type]              [description]
	 */
	public static function makeDir($srcPath, $mode = 777,$exclusive = true) {
		//转换为目录标识符
		$srcPath = Util::toFormatPath($srcPath);

		$tarDirPath = self::toPureDir($srcPath);
		
		if (file_exists($tarDirPath))
			return ;
		mkdir($tarDirPath,$model,true);
		//return $srcPath;
		// if ($res)
		// 	return $dirPath;
		// else
		// 	throw new Exception("Error Custom_log Processing", 1);
			
	
	}
	public static function toFormatPath($srcPath)
	{
		return str_replace(array('/','//','\\','\\\\'),DIRECTORY_SEPARATOR,$srcPath);
	}
	/**
	 * @DateTime 2018-07-27
	 * @Desc     将/字符后面的内容去掉
	 */
	public static function toPureDir($path)
	{
		return pathinfo($path)['dirname'];
		//return str_replace(strrchr($path, DIRECTORY_SEPARATOR), "", $path) . DIRECTORY_SEPARATOR;
		
	}
}	


