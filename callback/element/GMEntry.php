<?php

/*
 * 账号平台数据库配置
 */
class GMEntry{
function __construct($src) {
		Util::objectDeepClone($src,$this);
	}
	
public function modify($src)
{
Util::objectDeepClone($src,$this);
}
public function GetGMObject()
	{
		return (Object)array_filter((array)$this); 
	}
}
class MessageBodyInfo extends GMEntry
{
	public $languageId;
	public $title;
	public $content;


}


