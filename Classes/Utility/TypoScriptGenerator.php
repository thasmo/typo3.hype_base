<?php

class Tx_HypeBase_Utility_TypoScriptGeneratorUtility {
	static protected $cache;
	static protected $layouts;
	static protected $files = array(
		'include_static.txt',
		'constants.txt',
		'setup.txt',
		'editorcfg.txt',
		'include_static_file.txt'
	);

	static public function createTypoScript() {

		# load TCA for the sys_template table
		global $TCA;
		t3lib_div::loadTCA('sys_template');

		# apply cache if set
		if(count(self::$cache) > 0) {
			$TCA['sys_template']['columns']['include_static_file']['config']['items'] = array_merge($TCA['sys_template']['columns']['include_static_file']['config']['items'], self::$cache);
			return TRUE;
		}

		# get extension configuration
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['hype_base']);

		# clear local cache
		self::$cache = array();
		self::$layouts = array();

		# get configured path
		$typoscriptPath = realpath(t3lib_div::getFileAbsFileName($configuration['typoscriptPath']));

		# get directory items
		$items = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($typoscriptPath), RecursiveIteratorIterator::LEAVES_ONLY);

		# loop thru items
		foreach($items as $item) {

			# scan directory if files exists
			if($item->isFile() && in_array($item->getFilename(), self::$files) && !in_array($item->getPath(), self::$cache)) {

				# add to cache
				array_push(self::$cache, $item->getPath());
			}
		}

		# sort pathes
		sort(self::$cache);

		# add pathes
		foreach(self::$cache as $path) {

			# get relative directory path
			$dir = str_replace($typoscriptPath . DIRECTORY_SEPARATOR, '', $path);

			# get current directory
			$current = array_pop(explode(DIRECTORY_SEPARATOR, $dir));

			# skip if current directory name starts with an underscore
			if(preg_match('~^_~', $current)) {
				continue;
			}

			$item = array(
				trim('» ' . str_replace(DIRECTORY_SEPARATOR, ' › ', $dir)) . ' (hype_base)',
				$configuration['typoscriptPath'] . $dir
			);

			$TCA['sys_template']['columns']['include_static_file']['config']['items'][] = $item;
		}
	}
}

if(defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/hype_base/Classes/Utility/TypoScriptGenerator.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/hype_base/Classes/Utility/TypoScriptGenerator.php']);
}
?>