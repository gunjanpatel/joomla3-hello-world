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

/**
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class HelloWorldModelCategories extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     JController
	 * @since   1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'c.id',
				'title', 'c.title',
				'published', 'c.published',
				'access', 'c.access', 'access_level',
				'alias', 'c.alias'
			);
		}

		parent::__construct($config);
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
	 *
	 * @since   1.6
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.access');
		$id .= ':' . $this->getState('filter.published');

		return parent::getStoreId($id);
	}

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true)
				->select('c.*')
				->from($db->qn('#__helloworld_category', 'c'));

				// Join over the users for the checked out user.
		$query->select('uc.name AS editor')
				->join('LEFT', '#__users AS uc ON uc.id=c.checked_out');

		$query->select('au.title AS access_level')
				->join('LEFT', '#__viewlevels AS au ON au.id = c.access');

		// Filter by access level.
		if ($access = $this->getState('filter.access'))
		{
			$query->where('c.access = ' . (int) $access);
		}

		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where('c.published = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(c.published = 0 OR c.published = 1)');
		}


		// Filter by search in title.
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('c.id = ' . (int) substr($search, 3));
			}
			else
			{
				$search = $db->quote('%' . $db->escape($search, true) . '%');
				$query->where('(c.title LIKE ' . $search . ' OR c.alias LIKE ' . $search . ')');
			}
		}

		$query->where($db->qn('parent_id') . '!= 0');

		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering', 'c.lft');
		$orderDirn = $this->state->get('list.direction', 'asc');

		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}

}
