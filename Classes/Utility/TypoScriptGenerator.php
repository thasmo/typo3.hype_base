<?php

class Tx_HypeBase_Utility_TypoScriptGeneratorUtility {

	/**
	 * @var array Holds pathes to static template files
	 */
	static protected $cache = array();

	/**
	 * @var array Holds valid template file names
	 */
	static protected $names = array(
		'include_static',
		'constants',
		'setup',
		'editorcfg',
		'include_static_file',
	);

	/**
	 * @var array Holds valid file extensions
	 */
	static protected $extensions = array(
		'txt',
		'ts'
	);

	/**
	 * @return array
	 */
	static public function createTypoScript() {

		# return cache if populated
		if(count(self::$cache) > 0) {
			return self::$cache;
		}

		# get extension configuration
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['hype_base']);

		# make sure to have a valid path
		$configuration['typoscriptPath'] = rtrim(t3lib_div::fixWindowsFilePath($configuration['typoscriptPath']), '/') . '/';

		# get configured path
		$typoscriptPath = t3lib_div::getFileAbsFileName($configuration['typoscriptPath']);
		$storagePath = t3lib_div::getFileAbsFileName($configuration['storagePath']);

		if(!file_exists($typoscriptPath) || !is_dir($typoscriptPath)) {
			t3lib_div::sysLog('TypoScript inclusion path is not set or invalid.', 'hype_base', 0);
			return;
		}

		# reset directory contents
		t3lib_div::rmdir($storagePath, TRUE);
		t3lib_div::mkdir($storagePath);

		# get directory items
		$items = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($typoscriptPath), RecursiveIteratorIterator::LEAVES_ONLY);

		# loop thru items
		foreach($items as $item) {

			# scan directory if files exists
			if($item->isFile() &&
			   in_array($item->getBasename('.' . $item->getExtension()), self::$names) &&
			   in_array(strtolower($item->getExtension()), self::$extensions)) {

				# set item path
				$itemPath = t3lib_div::fixWindowsFilePath($item->getPath());

				# get relative directory path
				$relativeDirectoryPath = str_replace($typoscriptPath, '', $itemPath);

				# determine directory path
				$directoryPath = $storagePath . $relativeDirectoryPath;

				# create directory recursively
				if(!file_exists($directoryPath)) {
					t3lib_div::mkdir_deep(
						$storagePath,
						$relativeDirectoryPath
					);
				}

				# determine file path
				$filePath = ($item->getExtension() != 'txt')
					? $directoryPath . '/' . $item->getBasename('.' . $item->getExtension()) . '.txt'
					: $directoryPath . '/' . $item->getFilename();

				# copy file
				copy(t3lib_div::fixWindowsFilePath($item->getRealPath()), $filePath);

				# define template entry
				$template = array(
					trim('» ' . str_replace('/', ' › ', $relativeDirectoryPath)) . ' (hype_base)',
					$directoryPath
				);

				# add to cache
				if(!key_exists(md5($itemPath), self::$cache)) {
					self::$cache[md5($itemPath)] = $template;
				}
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