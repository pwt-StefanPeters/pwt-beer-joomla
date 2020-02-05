<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_beers
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="1%" class="center">
                <input type="checkbox" name="checkall-toggle" value="" class="hasTooltip" title="" onclick="Joomla.checkAll(this)" data-original-title="Check All Items">
            </th>
            <th>ID</th>
            <th>Name</th>
            <th>Tagline</th>
            <th>Description</th>
            <th>Alcohol percentage</th>
            <th>Rating</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->getBeers as $beer): ?>
        <tr>
            <td class="center">
                <input type="checkbox" id="cb0" name="cid[]" value="2" onclick="Joomla.isChecked(this.checked);">
            </td>

            <td><?= $beer['id'] ?></td>
            <td><?= $beer['name'] ?></td>
            <td><?= $beer['tagline'] ?></td>
            <td><?= $beer['description'] ?></td>
            <td><?= $beer['alcohol_percentage'] ?></td>
            <td><?= $beer['rating'] ?></td>
        </tr>
    <?php endforeach;?>

    </tbody>
</table>



