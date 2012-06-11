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
    <p><strong>Revenues minus Costs</strong></p>
    <p>as a direct effect of the investment</p>
    <p><?php print number_format($this->balances[$i-1], 0, ',', ' '); ?></p>
    <p class="ui-li-aside">PV: <strong><?php print number_format($value, 0, ',', ' ') ?></strong></p>
</li>
<?php $i++; ?>
<?php } ?>
<li>
    <h3>Residual Value</h3>
    <p><strong>Economic value of the investment</strong></p>
    <p>After the economic lifetime.</p>
    <p>Value Year <?php print $this->years; ?>: <?php print number_format($this->resValue, 0, ',', ' '); ?></p>
    <p class="ui-li-aside">Present Value: <strong><?php print number_format($this->results['curValResidual'], 0, ',', ' ') ?></strong></p>
</li>
<li data-theme="b" >
    <h3>Results - NPV</h3>
    <p><strong>Net Present Value</strong></p>
    <p>Positive value equals profitable investment.</p>
    <p class="ui-li-aside">NPV: <strong><?php print number_format($this->result, 0, ',', ' ') ?></strong></p>
    <?php if($this->result < 0){ ?>
        <p style="color: red;"><strong>Unprofitable</strong></p>
        <p style="color: red;">Avoid investment</p>
    <?php } ?>
</li>
<li data-theme="b" >
    <h3>Results - ARR</h3>
    <p><strong>Accounting Rate of Return</strong></p>
    <p>Percentage return of income from the investment.</p>
    <p>This value can be used to compare investments.</p>
    <p class="ui-li-aside">ARR: <strong><?php print number_format($this->arr, 2, ',', ' ')."%" ?></strong></p>
</li>