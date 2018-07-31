<?php
class GM_Log {
	private $gm_unique_tag;
	private $init = false;
	public function init_tag() {
		if (!$this->init) {
			date_default_timezone_set('Asia/Shanghai');
			$this->init = true;
			$this->gm_unique_tag = date('[H-i-s]',time());

		}
	}
	public function writeTargetLog($testJson)
	{
		//$tarDict ='/var/log/message';
		openlog("message", LOG_NDELAY , LOG_USER);   
		syslog(LOG_INFO,(string)$testJson);
		closelog();
	//	file_put_contents($tarDict, (string) $testJson, FILE_APPEND);
	}
	/**
	 * @DateTime 2018-07-31
	 * @Desc     log写入
	 * @param    jsObject     $gmJson  		  日值jsonObject	
	 * @param    string       $logFlag 		  日志写入标签
	 * @param    SubDirMask   $subDirLevel    日志二级文件夹划分规则
	 */
	public function writeGMLog($gmJson, $logFlag,$subDirMask=SubDirMask::HOUR) {
		if (!$this->init) {
			return;
		}
		//date_default_timezone_set('Asia/Shanghai');
		date_default_timezone_set('Asia/Shanghai');
		$formatStr = date('[H:i:s]',time()) . "\n" . '<' . $logFlag . '>' . "\n";
		$fstFileDir = dirname(dirname(__FILE__)) . AppConst::LOG_IO;
		$scdFileDir = date("[Y-m-d]");
		$subDir = null; 
		switch ($subDirMask) {
			case SubDirMask::HOUR:
				$subDir = date("H").'h';
				break;
			case SubDirMask::DAY:
				$subDir = date("[Y-m-d]");
			case SubDirMask::MONTH:
				$subDir = date("[Y-m]");
			default:
				# code...
				break;
		}
	
		//每次请求产生一次log文件
		$fileName = 'gm' . $this->gm_unique_tag . '.log';
		$filePath = Util::toFormatPath($fstFileDir . DIRECTORY_SEPARATOR . $scdFileDir . DIRECTORY_SEPARATOR .$subDir. DIRECTORY_SEPARATOR . $fileName);
		Util::makeDir($filePath);
		//print_r("write " . $filePath . "\n");
		file_put_contents($filePath, $formatStr, FILE_APPEND); //添加消息头

		file_put_contents($filePath, (string) $gmJson . "\n", FILE_APPEND); //消息体
	}
	public function writeClientLog($gmJson, string $logFlag) {

	}

}
?>
