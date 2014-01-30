<?php
	/**
	 * @package     Joomla.Administrator
	 * @subpackage  com_languages
	 *
	 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
	 * @license     GNU General Public License version 2 or later; see LICENSE.txt
	 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * HelloWorlds ListModel
 *
 * @since  0.0.1
 */
class HelloWorldModelHelloWorlds extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select('id,greeting');

		// From the hello table
		$query->from('#__helloworld');

		return $query;
	}
}
