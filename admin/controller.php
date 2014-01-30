<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_admin
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * HelloWorld Controller
 *
 * @since  0.0.1
 */
class HelloWorldController extends JControllerLegacy
{
	/**
	 * display task
	 *
	 * @param   boolean  $cachable   [description]
	 * @param   boolean  $urlparams  [description]
	 *
	 * @return  [type]               [description]
	 */
	function display($cachable = false, $urlparams = false)
	{
		// Set default view if not set
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'HelloWorlds'));

		// Call parent behavior
		parent::display($cachable);
	}
}
