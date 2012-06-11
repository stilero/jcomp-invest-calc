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
$cssPath = DS.'media'.DS.'investcalc'.DS.'assets'.DS;
//$document->addStyleSheet('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css');
//$document->addScript($assetsBasePath.'js'.DS.'jquery-1.7.2.min.js');
//$document->addScriptDeclaration('jQuery.noConflict()');
//$document->addScript('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js');
//$document->addScript($assetsBasePath.'js'.DS.'mobile.js');
$calculatorStart = JURI::base().'index.php?option=com_investmentcalculator&view=mobile&format=raw';
$helpPage = JURI::base().'index.php?option=com_investmentcalculator&view=help&format=raw&tpl=mobile';;
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>Investment Calculator - BerthTools</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<link rel="stylesheet" href="<?php print $assetsBasePath.'css'.DS.'berthtools-theme.min.css'; ?>" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<script src="<?php print $assetsBasePath.'js'.DS.'mobile.js'; ?>"></script>
</head> 

<body> 
    <div data-role="page" id="settings">
        <div data-role="header" data-position="inline">
                <h1>Investments</h1>
                <a href="<?php print $helpPage ?>" data-theme="b" data-icon="info">Help</a>
        </div>
	<div data-role="content">	
		<label for="rate">Discount rate:</label>
                <input type="number" name="rate" id="rate" data-mini="false" />
                <label for="years">Economic Life (years):</label>
                <input type="number" name="years" id="years" data-mini="false" />
                <label for="investment">Investment Value:</label>
                <input type="number" name="investment" id="investment" data-mini="false" />
                <label for="residual-value">Residual Value:</label>
                <input type="number" name="residual-value" id="residual-value" data-mini="false" />
	</div><!-- /content -->
        <div data-role="navbar" data-theme="a">
            <ul>
                <li><a href="#balance" class="ui-disabled" id="balance-btn" data-icon="arrow-r">Next Step</a></li>
            </ul>
        </div>
    </div><!-- /page -->
    <!-- Start of second page -->
    <div data-role="page" id="balance">
        <div data-role="header" data-position="inline">
            <h1>Investments</h1>
            <a href="#" class="calc-button" data-icon="check" data-theme="b">Calculate</a>
        </div>
        <div data-role="content" id="payback">	
                <label for="payment-balance-year-1">Payment Balance Year 1:</label>
                <input type="number" name="payment-balance-year-1" id="payment-balance-year-1" data-mini="false" />
        </div><!-- /content -->
        <div data-role="navbar" data-theme="a">
            <ul>
                <li><a href="#settings" data-theme="b" data-icon="arrow-l">Back</a></li>
                <li><a href="#results" class="calc-button" id="calc-btn" data-icon="grid" data-theme="c">Calculate</a></li>
            </ul>
        </div>
    </div><!-- /page -->
    <!-- Start of third page -->
    <div data-role="page" id="results">
        <div data-role="header" data-position="inline">
            <h1>Results</h1>
            <a href="<?php print $calculatorStart; ?>" data-icon="home" data-theme="b">New</a>
        </div>
        <div data-role="content">
            <div class="content-primary">
                <ul id="result" data-role="listview" data-inset="true" data-theme="c" data-dividertheme="d"></ul>
            </div>
        </div><!-- /content -->
        <div data-role="navbar" data-theme="a">
            <ul>
                <li><a href="<?php print $calculatorStart; ?>" data-icon="refresh">Restart</a></li>
            </ul>
        </div>
    </div><!-- /page -->
</body>
</html>
