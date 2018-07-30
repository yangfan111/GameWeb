<?php
require_once dirname(__FILE__) . '/GM_Entrance.php';

header('Content-Type:text/json;charset=utf-8');
$jsonObj = file_get_contents('php://input');
$jsonObj = file_get_contents(dirname(__FILE__) . '/config/cmd.json');

//print_r($jsonObj);

$ret = GM_Entrance::process($jsonObj);
//$gm = new GM_Mgr();
//$gm->initConfig();init_tag

echo ($ret);

?>
