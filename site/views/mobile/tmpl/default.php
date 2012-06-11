<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
$document =& JFactory::getDocument();
$document->addCustomTag('<meta name="viewport" content="width=device-width, initial-scale=1">');
$assetsBasePath = JURI::base( true ).DS.'media'.DS.'investcalc'.DS.'assets'.DS;
//$document->addStyleSheet($assetsBasePath.'css'.DS.'style.css');
$document->addStyleSheet('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css');
$document->addScript($assetsBasePath.'js'.DS.'jquery-1.7.2.min.js');
$document->addScriptDeclaration('jQuery.noConflict()');
$document->addScript('http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js');
$document->addScript($assetsBasePath.'js'.DS.'mobile.js');
?>
<div data-role="page" id="settings">
        <div data-role="header" data-position="inline">
                <h1>Investment Calculator</h1>
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
            <h1>Investment Calculator</h1>
            <a href="#" class="calc-button" data-icon="check" data-theme="b">Calculate</a>
        </div>
        <div data-role="content" id="payback">	
                <label for="payment-balance-year-1">Payment Balance Year 1:</label>
                <input type="number" name="payment-balance-year-1" id="payment-balance-year-1" data-mini="false" />
        </div><!-- /content -->
        <div data-role="navbar" data-theme="a">
            <ul>
                <li><a href="#settings" data-icon="arrow-l">Back</a></li>
                <li><a href="#results" class="calc-button" id="calc-btn" data-icon="grid" data-theme="e">Calculate</a></li>
            </ul>
        </div>
    </div><!-- /page -->
    <!-- Start of third page -->
    <div data-role="page" id="results">
        <div data-role="header" data-position="inline">
            <h1>Results</h1>
            <a href="mobile.html" data-icon="check" data-theme="b">New Investment</a>
        </div>
        <div data-role="content">
            <div class="content-primary">
                <ul id="result" data-role="listview" data-inset="true" data-theme="c" data-dividertheme="d"></ul>
            </div>
        </div><!-- /content -->
        <div data-role="navbar" data-theme="a">
            <ul>
                <li><a href="mobile.html" data-icon="refresh">Restart</a></li>
            </ul>
        </div>
    </div><!-- /page -->