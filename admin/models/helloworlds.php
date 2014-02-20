<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * HelloWorldList Model
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
		// Initialiase variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*')
		->from($db->qn('#__helloworld_category', 'c'))
		->where($db->qn('parent_id') . '!= 0');

		return $query;
	}
}
