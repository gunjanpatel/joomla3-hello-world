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
				// Create a new query object.
				$db = JFactory::getDBO();
				$query = $db->getQuery(true);

				// Select some fields from the hello table
				$query
					->select('id,greeting')
					->from('#__helloworld');

				return $query;
		}
}
