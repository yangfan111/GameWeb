<?php

/*
 * 账号平台数据库配置
 */
class GMEntry{
function __construct($src) {
		Util::objectDeepClone($src,$this);
	}
}
class MessageBodyInfo extends GMEntry
{
	public $languageID;
	public $title;
	public $content;


}


