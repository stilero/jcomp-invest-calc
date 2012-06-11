<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
?>
<li data-role="collapsible">
    <h3>Investment</h3>
    <p>Initial investment in present value (PV).</p>
    <p class="ui-li-aside"><strong><?php print number_format($this->results['investment'], 0, ',', ' ') ?></strong></p>
</li>
<? $i = 1; ?>
<?php foreach ($this->results['presValBalances'] as $value) { ?>
<li data-role="collapsible">
    <h3>Balance Year <?php print $i; ?></h3>
    <p><strong>Revenue minus Costs directly caused by investment.</strong></p>
    <p><?php print number_format($this->balances[$i-1], 0, ',', ' '); ?></p>
    <p class="ui-li-aside">PV: <strong><?php print number_format($value, 0, ',', ' ') ?></strong></p>
</li>
<?php $i++; ?>
<?php } ?>
<li>
    <h3>Residual Value</h3>
    <p><strong>How much can you sell the investment for after the economic lifetime.</strong></p>
    <p>Value Year <?php print $this->years; ?>: <?php print number_format($this->resValue, 0, ',', ' '); ?></p>
    <p class="ui-li-aside">Present Value: <strong><?php print number_format($this->results['curValResidual'], 0, ',', ' ') ?></strong></p>
</li>
<li data-theme="b" >
    <h3>Results - NPV</h3>
    <p><strong>Net Present Value</strong> Positive Net Present Value value means a profitable investment.</p>
    <p class="ui-li-aside">NPV: <strong><?php print number_format($this->result, 0, ',', ' ') ?></strong></p>
</li>
<li data-theme="b" >
    <h3>Results - ARR</h3>
    <p><strong>Accounting Rate of Return</strong> Percentage return of income from the investment.</p>
    <p class="ui-li-aside">ARR: <strong><?php print number_format($this->arr, 2, ',', ' ')."%" ?></strong></p>
</li>