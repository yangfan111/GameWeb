<?php
class GM_Log {
	private $gm_unique_tag;
	private $init = false;
	public function init_tag($gm_tag) {
		if (!$this->init) {
			$this->init = true;
			$this->gm_unique_tag = $gm_tag;

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
	public function writeGMLog($gmJson, $logFlag) {
		if (!$this->init) {
			return;
		}
		date_default_timezone_set('Asia/Shanghai');
		$script_tz = date_default_timezone_get();
		$formatStr = date("[H:i:s] ") . "\n" . '<' . $logFlag . '>' . "\n";
		$fstFileDir = dirname(dirname(__FILE__)) . AppConst::LOG_IO;
		$scdFileDir = date("[Y-m-d]");
		//每次请求产生一次log文件
		$fileName = 'gm_' . $this->gm_unique_tag . '.log';
		$filePath = Util::toFormatPath($fstFileDir . DIRECTORY_SEPARATOR . $scdFileDir . DIRECTORY_SEPARATOR . $fileName);
		Util::makeDir($filePath);
		print_r("write " . $filePath . "\n");
		
		file_put_contents($filePath, $formatStr, FILE_APPEND); //添加消息头

		file_put_contents($filePath, (string) $gmJson . "\n", FILE_APPEND); //消息体
	}
	public function writeClientLog($gmJson, string $logFlag) {

	}

}
?>
