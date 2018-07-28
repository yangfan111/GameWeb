<?php
class GM_Log {
	private $gm_unique_tag;
	private $init = false;
	public function init_tag($gm_tag) {
		if (!$this->init) {
			$init->init = true;
			$this->gm_unique_tag = $gm_tag;

		}
	}
	public function writeGMLog($gmJson, $logFlag) {
		// if (!$this->init) {
		// 	return;
		// }
		$formatStr = date("[H:i:s] ") . "\n" . '<' . $logFlag . '>' . "\n";
		$fstFileDir = dirname(dirname(__FILE__)) . AppConst::LOG_IO;
		$scdFileDir = date("[Y-m-d]");
		//每次请求产生一次log文件
		$fileName = 'gm_' . $this->gm_unique_tag . '.log';
		$filePath = Util::toFormatPath($fstFileDir . '/' . $scdFileDir . '/' . $fileName);
		Util::makeDir($filePath);
		print_r("write " . $filePath . "\n");

		file_put_contents($filePath, $formatStr, FILE_APPEND); //添加消息头

		file_put_contents($filePath, (string) $gmJson . "\n", FILE_APPEND); //消息体
	}
	public function writeClientLog($gmJson, string $logFlag) {

	}

}
?>
