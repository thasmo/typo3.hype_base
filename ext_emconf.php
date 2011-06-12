<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_base".
#
# Auto generated 12-06-2011 03:04
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Hype Base',
	'description' => 'Provides a basic typoscript/template inclusion system for developing websites.',
	'category' => 'be',
	'author' => 'Thomas "Thasmo" Deinhamer',
	'author_email' => 'thasmo@gmail.com',
	'shy' => 0,
	'version' => '1.1.0',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnload' => 1,
	'lockType' => '',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.3.0-4.5.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:21:"ext_conf_template.txt";s:4:"bce3";s:12:"ext_icon.gif";s:4:"d959";s:17:"ext_localconf.php";s:4:"90f2";s:14:"ext_tables.php";s:4:"76ed";s:10:"readme.txt";s:4:"a455";s:42:"Classes/Hook/class.tx_hypebase_tcemain.php";s:4:"82d7";s:39:"Classes/Utility/TypoScriptGenerator.php";s:4:"d6f2";s:14:"doc/manual.pdf";s:4:"1db6";s:14:"doc/manual.sxw";s:4:"10c7";s:14:"doc/manual.txt";s:4:"ec87";}',
	'suggests' => array(
	),
);

?>