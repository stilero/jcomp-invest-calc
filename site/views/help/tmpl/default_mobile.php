<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
//$document =& JFactory::getDocument();
//$document->addCustomTag('<meta name="viewport" content="width=device-width, initial-scale=1">');
$assetsBasePath = JURI::base( true ).DS.'media'.DS.'investcalc'.DS.'assets'.DS;
//$document->addStyleSheet('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css');
//$document->addScript($assetsBasePath.'js'.DS.'jquery-1.7.2.min.js');
//$document->addScriptDeclaration('jQuery.noConflict()');
//$document->addScript('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js');
//$document->addScript($assetsBasePath.'js'.DS.'mobile.js');
$calculatorStart = JURI::base().'index.php?option=com_investmentcalculator&view=mobile&format=raw';
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>Help</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<script src="<?php print $assetsBasePath.'js'.DS.'mobile.js'; ?>"></script>
</head> 

<body> 
    <div data-role="dialog">
        <div data-role="header" data-theme="d">
            <h1>Help</h1>
        </div>
        <div data-role="content" data-theme="c">
            <?php echo $this->loadTemplate('helptext'); ?>
            <a href="<?php print $calculatorStart; ?>" data-role="button" data-rel="back" data-theme="b">OK</a>       
        </div>
	</div>
</body>
</html>
