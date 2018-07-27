<?php

class GMEntry{
function __construct($src) {
		Util::objectDeepClone($src,$this);
	}


}