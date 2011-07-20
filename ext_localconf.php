<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');

# HOOKS

# Backend
if(TYPO3_MODE == 'BE') {

	# TCE Clear Cache
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc'][$_EXTKEY] = 'EXT:hype_base/Classes/Hook/class.tx_hypebase_tcemain.php:tx_hypebase_tcemain->clear_cacheCmd';
}



# HACKS

# TypoScript from fileadmin
$GLOBALS['TYPO3_LOADED_EXT']['__fileadmin__']['siteRelPath'] = 'fileadmin/';

?>