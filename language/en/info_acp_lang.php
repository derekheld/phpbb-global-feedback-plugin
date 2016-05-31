<?php

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'HEATWARE_FORCE_BADGE'		=> 'Enable badge for all users',
	'HEATWARE_API_KEY_SETTING'	=> 'API Key',
	'HEATWARE_SYNC_SETTING'		=> 'Feedback synchronization frequency',
	'HEATWARE_GLOBAL_SETTING'	=> 'Enable feedback badges for all users',
));