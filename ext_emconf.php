<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_base".
#
# Auto generated 07-10-2011 23:42
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Hype Base',
	'description' => 'Automatically adds static typoscript files from within a specified directory to the static includes option inside template records.',
	'category' => 'be',
	'author' => 'Thomas "Thasmo" Deinhamer',
	'author_email' => 'thasmo@gmail.com',
	'shy' => 0,
	'version' => '1.1.8',
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
	'_md5_values_when_last_written' => 'a:10:{s:21:"ext_conf_template.txt";s:4:"ff4c";s:12:"ext_icon.gif";s:4:"d959";s:17:"ext_localconf.php";s:4:"6b34";s:14:"ext_tables.php";s:4:"3c7a";s:10:"readme.txt";s:4:"a455";s:42:"Classes/Hook/class.tx_hypebase_tcemain.php";s:4:"1d04";s:39:"Classes/Utility/TypoScriptGenerator.php";s:4:"59a6";s:14:"doc/manual.pdf";s:4:"6446";s:14:"doc/manual.sxw";s:4:"3967";s:14:"doc/manual.txt";s:4:"b26a";}',
	'suggests' => array(
	),
);

?>