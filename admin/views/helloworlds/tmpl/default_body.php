<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

foreach ($this->items as $i => $item)
{
	if ($item->level >= 1)
	{
		$parentsStr = "";
		$_currentParentId = $item->parent_id;
		$parentsStr = " " . $_currentParentId;
		$v="";
		for ($i2 = 0; $i2 < $item->level; $i2++)
		{

			$v.= "-";
		}
		$v= $v ." ". $item->title;
		?>
		<tr >
			<td>
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo $item->level; ?>
			</td>
			<td>
				<?php echo $v; ?>
			</td>
			<td>
				<?php echo $item->alias; ?>
			</td>
		</tr>
	<?php

	}
	else
	{
		?>
	<tr >
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->level; ?>
		</td>
		<td>
			<?php echo $item->title; ?>
		</td>
		<td>
			<?php echo $item->alias; ?>
		</td>
	</tr>
<?php
}
}
