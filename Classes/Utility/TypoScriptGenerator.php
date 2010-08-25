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
			$dir = str_replace($typoscriptPath . '/', '', $path);
			
			# get current directory
			$current = array_pop(explode('/', $dir));
			
			# skip if current directory name starts with an underscore
			if(preg_match('~^_~', $current)) {
				continue;
			}
			
			$item = array(
				trim('» ' . str_replace('/', ' › ', $dir)) . ' (hype_base)',
				$configuration['typoscriptPath'] . $dir
			);
			
			$TCA['sys_template']['columns']['include_static_file']['config']['items'][] = $item;
			
			/*
			# add to layout stack
			if(preg_match('~^Layout\/~', $dir)) {
				array_push(self::$layouts, str_replace('Layout/', '', $dir));
			}
			*/
		}
		
		/*
		$data = 'TCEFORM.pages {
			layout.removeItems = 1,2,3
			
			layout.altLabels.0 =';
		
		$constants = '';
		$setup = '';
		
		foreach(self::$layouts as $key => $layout) {
			$id = $key + 4;
			
			$data .= chr(10) . 'layout.addItems.' . $id . ' = ' . str_replace('/', ' › ', $layout);
			
			$constants .= '
			[globalVar = TSFE:page|layout = ' . $id . ']
			<INCLUDE_TYPOSCRIPT: source="FILE: typo3conf/ext/hype_base/Resources/Private/TypoScript/' . $layout . '/constants.txt">
			[global]';
			
			$setup .= '
			[globalVar = TSFE:page|layout = ' . $id . ']
			<INCLUDE_TYPOSCRIPT: source="FILE: typo3conf/ext/hype_base/Resources/Private/TypoScript/' . $layout . '/setup.txt">
			[global]';
		}
		
		$data .= chr(10) . '}';
		
		t3lib_extMgm::addPageTSConfig($data);
		t3lib_extMgm::addTypoScriptConstants($constants);
		t3lib_extMgm::addTypoScriptSetup($setup);
		*/
	}
}
?>