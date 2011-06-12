<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Thomas "Thasmo" Deinhamer <thasmo@gmail.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

# add dynamic setup and constants
require_once t3lib_extMgm::extPath('hype_base') . 'Classes/Utility/TypoScriptGenerator.php';

class tx_hypebase_tcemain {

	function clear_cacheCmd($command, $TCE) {

		if($TCE->admin || $TCE->BE_USER->getTSConfigVal('options.clearCache.all')) {
			$contents = serialize(Tx_HypeBase_Utility_TypoScriptGeneratorUtility::createTypoScript());
			@file_put_contents(PATH_site . '/typo3temp/hypebase.txt', $contents);
		}
	}
}

?>