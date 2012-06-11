<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
?>
<h3>Results</h3>
<table class="jtable">
    <thead>
        <tr>
            <th style="width: 30%;">Description</th>
            <th style="width: 13%;">Value</th>
            <th style="width: 13%;">Present value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Investment</td>
            <td style="text-align: right;"><?php print number_format($this->results['investment'], 0, ',', ' ') ?></td>
            <td style="text-align: right;"><?php print number_format($this->results['investment'], 0, ',', ' ') ?></td>
        </tr>
        <? $i = 1; ?>
        <?php foreach ($this->results['presValBalances'] as $value) { ?>
        <tr>
            <td>Balance Year <?php print $i; ?></td>
            <td style="text-align: right;"><?php print number_format($this->balances[$i-1], 0, ',', ' '); ?></td>
            <td style="text-align: right;"><?php print number_format($value, 0, ',', ' ') ?></td>
        </tr>
        <?php $i++; ?>
        <?php } ?>
        <tr>
            <td>Residual Value</td>
            <td style="text-align: right;"><?php print number_format($this->resValue, 0, ',', ' '); ?></td>
            <td style="text-align: right;"><?php print number_format($this->results['curValResidual'], 0, ',', ' ') ?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="2">Results - Net Present Value</th>
            <th style="text-align: right;"><?php print number_format($this->result, 0, ',', ' ') ?></th>
        </tr>
        <tr>
            <th colspan="2">Results - Accounting Rate of Return</th>
            <th style="text-align: right;"><?php print number_format($this->arr, 2, ',', ' ')."%" ?></th>
        </tr>
    </tfoot>
</table>