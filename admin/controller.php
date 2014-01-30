<?php

// No direct access to this file
defined('_JEXEC') or die;
/**
 * General Controller of HelloWorld component
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

		// All parent behavior
		parent::display($cachable);
	}
}