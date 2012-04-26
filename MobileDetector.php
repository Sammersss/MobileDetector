<?php

class MobileDetector {

	protected static $_devices = array(
		"android"       => '(android)',
		"blackberry"    => '(blackberry)',
		"iphone"        => '(iphone|ipod)',
		"ipad"			=> '(ipad)',
		"opera"         => '(opera mini)',
		"palm"          => '(avantgo|blazer|elaine|hiptop|palm|plucker|xiino)',
		"windows"       => '(iemobile|ppc|smartphone|windows phone)',
		"other"         => '(kindle|mobile|mmp|midp|o2|pda|pocket|psp|symbian|smartphone|treo|up.browser|up.link|vodafone|wap)',
	);

	public static function check()
	{
		$result = NULL;

		if (!empty($_SERVER['HTTP_USER_AGENT']))
		{
			foreach (static::$_devices as $device => $expr)
			{
				if (preg_match('~' . $expr . '~i', mb_strtolower($_SERVER['HTTP_USER_AGENT']), $matches))
				{
					$result = 'other' != $device ? $device : $matches[1];
					break;
				}
			}
		}

		return $result;
	}

}
