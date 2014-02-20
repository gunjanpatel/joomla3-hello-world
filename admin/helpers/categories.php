<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die;

/**
 * Tags helper class, provides methods to perform various tasks relevant
 * tagging of content.
 *
 * @package     Joomla.Libraries
 * @subpackage  Helper
 * @since       3.1
 */
class JHelperCategories extends JHelper
{

/**
	 * Function to search tags
	 *
	 * @param   array  $filters  Filter to apply to the search
	 *
	 * @return  array
	 *
	 * @since   3.1
	 */
	public static function searchTags($filters = array())
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select('a.parent_id AS value')
			->select('a.title AS text')
			->select('a.title')
			->from('#__helloworld_categories AS a')
			->join('LEFT', $db->quoteName('#__helloworld_categories', 'b') . ' ON a.lft > b.lft AND a.rgt < b.rgt');

		// Do not return root
		$query->where($db->quoteName('a.alias') . ' <> ' . $db->quote('root'));

		// Filter title
		if (!empty($filters['title']))
		{
			$query->where($db->quoteName('a.title') . ' = ' . $db->quote($filters['title']));
		}

		// Filter on the published state
		if (is_numeric($filters['published']))
		{
			$query->where('a.published = ' . (int) $filters['published']);
		}

		// Filter by parent_id
		if (!empty($filters['parent_id']))
		{
			JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_helloworld/tables');
			$tagTable = JTable::getInstance('Category', 'HelloWorldTable');

			if ($children = $tagTable->getTree($filters['parent_id']))
			{
				foreach ($children as $child)
				{
					$childrenIds[] = $child->id;
				}

				$query->where('a.id IN (' . implode(',', $childrenIds) . ')');
			}
		}

		$query->group('a.id, a.title, a.level, a.lft, a.rgt, a.parent_id, a.published')
			->order('a.lft ASC');

		// Get the options.
		$db->setQuery($query);

		try
		{
			$results = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			return false;
		}

		// We will replace path aliases with tag names
		$results = self::convertPathsToNames($results);

		return $results;
	}
}
