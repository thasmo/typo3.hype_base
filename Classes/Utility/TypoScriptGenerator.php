<?php

class Tx_HypeBase_Utility_TypoScriptGeneratorUtility {
	static protected $cache = array();
	static protected $files = array(
		'include_static.txt',
		'constants.txt',
		'setup.txt',
		'editorcfg.txt',
		'include_static_file.txt'
	);

	static public function createTypoScript() {

		# get extension configuration
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['hype_base']);

		# get configured path
		$typoscriptPath = realpath(t3lib_div::getFileAbsFileName($configuration['typoscriptPath']));

		if(!file_exists($typoscriptPath) || !is_dir($typoscriptPath)) {
			t3lib_div::sysLog('TypoScript inclusion path is not set or invalid.', 'hype_base', 0);
			return;
		}

		# get directory items
		$items = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($typoscriptPath), RecursiveIteratorIterator::LEAVES_ONLY);

		# loop thru items
		foreach($items as $item) {

			# scan directory if files exists
			if($item->isFile() && in_array($item->getFilename(), self::$files) && !in_array($item->getPath(), self::$cache)) {

				# get relative directory path
				$dir = str_replace($typoscriptPath . DIRECTORY_SEPARATOR, '', $item->getPath());

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

				# add to cache
				array_push(self::$cache, $item);
			}
		}

		# sort pathes
		sort(self::$cache);

		return self::$cache;
	}
}

if(defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/hype_base/Classes/Utility/TypoScriptGenerator.php']) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/hype_base/Classes/Utility/TypoScriptGenerator.php']);
}
?>