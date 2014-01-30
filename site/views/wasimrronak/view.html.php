<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class HelloWorldViewwasimrronak extends JViewLegacy
{
		/**
		 * Overwriting JView display method
		 *
		 * @param   [type]  $tpl  [description]
		 *
		 * @return [type]      [description]
		 */
		function display($tpl = null)
		{
				// Assign data to the view
				$this->msg = 'Hello World ronak wasim';

				// Display the view
				parent::display($tpl);
		}
}
