<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$app		= JFactory::getApplication();
$user		= JFactory::getUser();
$userId		= $user->get('id');
$archived	= $this->state->get('filter.published') == 2 ? true : false;
$trashed	= $this->state->get('filter.published') == -2 ? true : false;
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>
<script type="text/javascript">
	Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		}
		else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_helloworld&view=categories'); ?>" method="post" name="adminForm" id="adminForm">
	<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<?php
		// Search tools bar
		echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
		?>
		<?php if (empty($this->items)) : ?>
			<div class="alert alert-no-items">
				<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
		<?php else : ?>
	<table class="table table-striped" id="articleList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<?php echo JHtml::_('grid.checkall'); ?>
					</th>
					<th width="1%" style="min-width:55px" class="nowrap center">
						<?php echo JHtml::_('grid.sort', 'JSTATUS', 'c.published', $listDirn, $listOrder); ?>
					</th>
						<th>
					<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'c.title', $listDirn, $listOrder); ?>
						</th>
					<th width="1%" class="nowrap hidden-phone">
						<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'c.id', $listDirn, $listOrder); ?>
					</th>
					<th width="1%" class="nowrap center">
						<?php echo JHtml::_('grid.sort', 'JSTATUS', 'c.published', $listDirn, $listOrder); ?>
					</th>
					<th width="1%" class="nowrap center">
						<?php echo JHtml::_('grid.sort', 'ACCESS', 'c.access', $listDirn, $listOrder); ?>
					</th>

					</tr>
			</thead>
			<tbody>
			<?php

	foreach ($this->items as $i => $item) :
	$canCreate	= $user->authorise('core.create',     'com_helloworld.category.' . $item->id);
	$canEdit	= $user->authorise('core.edit',       'com_helloworld.category.' . $item->id);
	$canCheckin	= $user->authorise('core.manage',     'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
	$canEditOwn	= $user->authorise('core.edit.own',   'com_helloworld.category.' . $item->id) && $item->created_user_id == $userId;
	$canChange	= $user->authorise('core.edit.state', 'com_helloworld.category.' . $item->id) && $canCheckin;
	?>
	<tr class="row<?php echo $i % 2; ?>" sortable-group-id="<?php echo $item->id; ?>">
		<td class="center hidden-phone">
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td class="center">
				<?php echo JHtml::_('jgrid.published', $item->published, $i, 'categories.'); ?>
		</td>
		<td class="nowrap has-context">
			<div class="pull-left">
				<?php if ($item->checked_out) : ?>
					<?php
					// To display Loc Icon
					echo JHtml::_(
						'jgrid.checkedout',
						$i,
						$item->editor,
						$item->checked_out_time,
						'categories.',
						$canCheckin
					);
					?>
			<?php endif; ?>
			<a href="<?php echo JRoute::_('index.php?option=com_helloworld&task=category.edit&id='.(int) $item->id); ?>"
			title="<?php echo JText::_('JACTION_EDIT'); ?>">
			<?php
			echo str_repeat('<span class="gi">&mdash;</span>', $item->level - 1);
			echo $this->escape($item->title);
			?>
					</div>

				</td>
				<td class="center hidden-phone">
					<?php echo (int) $item->id; ?>
				</td>
				<td>
					<?php echo (int) $item->published; ?>
				</td>
				<td class="center hidden-phone">
					<?php echo  $item->access_level; ?>
				</td>
			</tr>

			<?php endforeach; ?>
		</tbody>

		</table>
	<?php endif; ?>
	<?php echo $this->pagination->getListFooter(); ?>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
