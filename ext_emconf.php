<?php

########################################################################
# Extension Manager/Repository config file for ext "hype_base".
#
# Auto generated 28-01-2012 22:53
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
	'version' => '1.1.10',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => 'typo3conf/ext/hype_base/Resources/Public/TypoScript/',
	'modify_tables' => '',
	'clearCacheOnload' => 1,
	'lockType' => '',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.3.0-4.6.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:41:{s:21:"ext_conf_template.txt";s:4:"ff4c";s:12:"ext_icon.gif";s:4:"d959";s:17:"ext_localconf.php";s:4:"6b34";s:14:"ext_tables.php";s:4:"3c7a";s:10:"readme.txt";s:4:"a455";s:42:"Classes/Hook/class.tx_hypebase_tcemain.php";s:4:"1d04";s:39:"Classes/Utility/TypoScriptGenerator.php";s:4:"59a6";s:55:"Resources/Public/TypoScript/Page/Medium/Print/setup.txt";s:4:"c9d6";s:56:"Resources/Public/TypoScript/Page/Medium/Screen/setup.txt";s:4:"efd9";s:55:"Resources/Public/TypoScript/Page/Service/JSON/setup.txt";s:4:"f5a5";s:54:"Resources/Public/TypoScript/Page/Service/XML/setup.txt";s:4:"5562";s:43:"Resources/Public/TypoScript/Setup/setup.txt";s:4:"757d";s:59:"Resources/Public/TypoScript/Setup/Application/constants.txt";s:4:"f260";s:55:"Resources/Public/TypoScript/Setup/Application/setup.txt";s:4:"9a86";s:62:"Resources/Public/TypoScript/Setup/Extension/News/constants.txt";s:4:"56a5";s:58:"Resources/Public/TypoScript/Setup/Extension/News/setup.txt";s:4:"b691";s:60:"Resources/Public/TypoScript/Setup/Extension/Search/setup.txt";s:4:"a0b4";s:61:"Resources/Public/TypoScript/Setup/Extension/Sitemap/setup.txt";s:4:"422e";s:53:"Resources/Public/TypoScript/Setup/TYPO3/constants.txt";s:4:"690e";s:49:"Resources/Public/TypoScript/Setup/TYPO3/setup.txt";s:4:"4dcc";s:70:"Resources/Public/TypoScript/Setup/TYPO3/ImageEnlargement/constants.txt";s:4:"86b8";s:66:"Resources/Public/TypoScript/Setup/TYPO3/ImageEnlargement/setup.txt";s:4:"6070";s:46:"Resources/Public/TypoScript/Site/constants.txt";s:4:"c181";s:56:"Resources/Public/TypoScript/Template/Component/setup.txt";s:4:"bd06";s:64:"Resources/Public/TypoScript/Template/Component/Content/setup.txt";s:4:"ab9d";s:67:"Resources/Public/TypoScript/Template/Component/Navigation/setup.txt";s:4:"d54e";s:67:"Resources/Public/TypoScript/Template/Component/Typography/setup.txt";s:4:"f7c2";s:67:"Resources/Public/TypoScript/Template/Document/Default/constants.txt";s:4:"0efe";s:63:"Resources/Public/TypoScript/Template/Document/Default/setup.txt";s:4:"8b29";s:57:"Resources/Public/TypoScript/Template/Layout/constants.txt";s:4:"7f96";s:53:"Resources/Public/TypoScript/Template/Layout/setup.txt";s:4:"a25e";s:65:"Resources/Public/TypoScript/Template/Layout/Default/constants.txt";s:4:"cf59";s:61:"Resources/Public/TypoScript/Template/Layout/Default/setup.txt";s:4:"7a1a";s:62:"Resources/Public/TypoScript/Template/Layout/Home/constants.txt";s:4:"ec1f";s:58:"Resources/Public/TypoScript/Template/Layout/Home/setup.txt";s:4:"9db6";s:56:"Resources/Public/TypoScript/Template/View/News/setup.txt";s:4:"02db";s:58:"Resources/Public/TypoScript/Template/View/Search/setup.txt";s:4:"76f9";s:59:"Resources/Public/TypoScript/Template/View/Sitemap/setup.txt";s:4:"dbea";s:14:"doc/manual.pdf";s:4:"6446";s:14:"doc/manual.sxw";s:4:"3967";s:14:"doc/manual.txt";s:4:"b26a";}',
	'suggests' => array(
	),
);

?>