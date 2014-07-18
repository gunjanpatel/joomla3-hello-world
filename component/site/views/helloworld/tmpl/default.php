<?php
/**
 * @package     HelloWorld.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;
?>
<div class="span12">

	<h3 class="">Helloworld Category</h3>
	<ul class="inline">
		<?php
		foreach ($this->items as  $item)
		{
		?>
			<div class="span6">
				<li class="a">
					<?php
						echo $item->id . "&nbsp&nbsp&nbsp";
						 echo $item->title . "<br>";
					?> 
					<img src="<?php echo JURI::root() . '/images/' . $item->image;?>"  alt="not available"  height="150" width="150">
				</li>
			</div>
	
		<?php
		}
		?>
	</ul>
</div>

<div class="footer">
	<?php echo $this->pagination->getListFooter(); ?>
</div>
