<?php
/**
 * Description of investCalc
 *
 * @version  1.0
 * @author Daniel Eliasson - joomla at stilero.com
 * @copyright  (C) 2012-jun-08 Stilero Webdesign http://www.stilero.com
 * @category Components
 * @license	GPLv2
 * 
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * 
 * This file is part of view.html.
 * 
 * investCalc is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * investCalc is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with investCalc.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

 
/**
 * HTML View class for the HelloWorld Component
 */
class InvestmentcalculatorViewCalculatormobile extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
            $investment = JRequest::getInt('investment', 0);
            $years = JRequest::getInt('years', 0);
            $rate = JRequest::getInt('rate',0);
            $resValue = JRequest::getInt('resValue',0);
            $balances = JRequest::get('balances');
            $balances = $balances['balances'];
            JLoader::register( 'Investment', JPATH_ADMINISTRATOR.DS.'components'.DS.'com_investmentcalculator'.DS.'helpers'.DS.'investment.php');
            $inv = new Investment();
            $result = $inv->investmentProfit($investment, $years, $rate, $balances, $resValue);
            $accountingRateOfReturn = 100*($result / $investment);
            
            // Assign data to the view
		$this->result = $result;
                $this->results = $inv->results;
                $this->balances = $balances;
                $this->years = $years;
                $this->resValue = $resValue;
                $this->arr = $accountingRateOfReturn;
 
		// Display the view
		parent::display($tpl);
	}
}