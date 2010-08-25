<?php

if(!defined('TYPO3_MODE'))
	die('Access denied.');


# add default setup and constants
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/', 'Hype Base');

# add dynamic setup and constants
require_once t3lib_extMgm::extPath($_EXTKEY) . 'Classes/Utility/TypoScriptGenerator.php';
Tx_HypeBase_Utility_TypoScriptGeneratorUtility::createTypoScript();

?>