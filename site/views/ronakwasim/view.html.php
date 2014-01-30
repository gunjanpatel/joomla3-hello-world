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
class HelloWorldViewronakwasim extends JViewLegacy
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
			$this->msg = 'New view';

			// Display the view
			parent::display($tpl);
	}
}
