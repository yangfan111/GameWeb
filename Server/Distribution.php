<?php
header('Content-Type:text/json;charset=utf-8');
$ret = GM_Entrance::process(null);
$jsonRet = json_encode($ret);
echo $jsonRet;
?>
