<?php
class GM_Log{

	
	public  function writeLog($gmJson,string $logFlag){

		$formatStr = date("[H:i:s] ").$logFlag.':';
		$fstFileDir = dirname(dirname(__FILE__)).AppConst::LOG_IO;
		$scdFileDir = date("[Y-m-d]");
		
		$fileName = date("H").'h'.'.log';
		
		$filePath = Util::toFormatPath($fstFileDir.'/'.$scdFileDir.'/'.$fileName);
		Util::makeDir($filePath);
		print_r("write ".$filePath."\n");
 		file_put_contents($filePath,$formatStr,FILE_APPEND);//添加消息头
 		//写入消息体
 		file_put_contents($filePath,(string)$gmJson."\n",FILE_APPEND);//消息体
 		//file_put_contents($filePath,"\n",FILE_APPEND);//换行符

	}


}
?>
