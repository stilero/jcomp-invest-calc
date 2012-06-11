<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//
//$useragent=$_SERVER['HTTP_USER_AGENT'];
//if(preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
//header('Location: http://detectmobilebrowser.com/mobile');



//No direct access
defined('_JEXEC) or die;');
$document =& JFactory::getDocument();
$assetsBasePath = JURI::base( true ).DS.'media'.DS.'investcalc'.DS.'assets'.DS;
$document->addStyleSheet($assetsBasePath.'css'.DS.'style.css');
$document->addStyleSheet($assetsBasePath.'css'.DS.'jquery-ui-1.8.21.custom.css');
$document->addScriptDeclaration('jQuery.noConflict()');
$document->addScript($assetsBasePath.'js'.DS.'jquery-1.7.2.min.js');
$document->addScript($assetsBasePath.'js'.DS.'jquery-ui-1.8.21.custom.min.js');
$document->addScript($assetsBasePath.'js'.DS.'main.js');
?>
<h1>Investment Calculator</h1>
<div id="dialog" title="Help">
</div>
<!-- Settings -->
<button id="help-button">Help</button>
<p>This tool helps you analyze if an investment will be profitable or not. The investment calculator calculates your revenues and cost to present value, to make the result comparable with other investments.</p>
<h2 class="demoHeaders">Settings</h2>
<div class="settings">
    <label for="interest-rate">Discount rate (%):</label>
    <input id="interest-rate" name="rate" type="number" size="20" maxlength="20" class="inputbox" title="The rate of return that could be earned on an investment in the financial markets with similar risk." validation=”required number” />
    <label for="economic-life">Economic life (years):</label>
    <input id="economic-life" name="rate" type="number" size="20" maxlength="20" class="inputbox" title="The expected economic lifetime in years of the investment." />
    <label for="investment">Investment Value:</label>
    <input id="investment" name="rate" type="number" size="20" maxlength="20" class="inputbox" title="The initial cost of the investment." />
    <label for="residual-value">Residual Value:</label>
    <input id="residual-value" name="rate" type="number" size="20" maxlength="20" class="inputbox" title="The remaining value of an assets after it has been fully depreciated." />
</div>
<div class="payback"></div>
<button id="calc-button" disabled="true">Calculate</button>
<div id="results"></div>