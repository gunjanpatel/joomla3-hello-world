<?php
/**
 * @package     Helloworld.site
 * @subpackage  com_categories
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class HelloWorldViewekta extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->msg = 'Hello Ekta';

		// Display the view
		parent::display($tpl);
	}
}
