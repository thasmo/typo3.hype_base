<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');


# add default setup and constants
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype Base');

# add dynamic setup and constants
$path = PATH_site . '/typo3temp/hypebase.txt';

if(file_exists($path)) {

	$contents = @file_get_contents($path);
	$files = unserialize($contents);

	if(count($files) > 0) {
		global $TCA;
		t3lib_div::loadTCA('sys_template');
		$TCA['sys_template']['columns']['include_static_file']['config']['items'] = array_merge($TCA['sys_template']['columns']['include_static_file']['config']['items'], $files);
	}
}

?>