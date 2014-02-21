<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');
?>
<form action="index.php?option=com_helloworld&view=category&task=category.edit&id=<?php echo $this->item->id; ?>"
	method="post"
	id="adminForm"
	name="adminForm"
	class="form-validate form-horizontal"
	enctype="multipart/form-data">

	<input type="hidden" name="task" value="" />
	<input type="hidden" name="id" value="<?php echo $this->item->id; ?>" />

	<?php echo JHtml::_('form.token'); ?>

	<div class="row-fluid">
	<?php foreach ($this->form->getFieldset() as $field) : ?>

		<?php if ($field->hidden) : ?>
		<?php echo $field->input;?>
		<?php endif; ?>

		<div class="control-group">
			<div class="control-label">
				<?php echo $field->label; ?>
			</div>
			<div class="controls">
				<?php echo $field->input; ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</form>
