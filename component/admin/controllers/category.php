<?php

// No direct access to this file
defined('_JEXEC') or die;

// Import Joomla controlleradmin library
jimport('joomla.application.component.controlleradmin');

/**
 * HelloWorlds Controller
 *
 * @since  0.0.1
 */
class HelloWorldControllerCategory extends JControllerForm
{
	/**
	 * This is just a proxy for the formbehavior.ajaxchosen method
	 *
	 * @param   string   $selector     DOM id of the tag field
	 * @param   boolean  $allowCustom  Flag to allow custom values
	 *
	 * @return  void
	 *
	 * @since   3.1
	 */
	public static function ajaxfield($selector='#jform_tags', $allowCustom = true)
	{

		// Tags field ajax
		$chosenAjaxSettings = new JRegistry(
			array(
				'selector'    => $selector,
				'type'        => 'GET',
				'url'         => JUri::root() . 'index.php?option=com_helloworld&task=categories.searchAjaxcategory',
				'dataType'    => 'json',
				'jsonTermKey' => 'like'
			)
		);
		JHtml::_('formbehavior.ajaxchosen', $chosenAjaxSettings);
	}

}
