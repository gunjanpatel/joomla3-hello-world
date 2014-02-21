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

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldCategorylist extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Categorylist';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from('#__helloworld_category')
				->where('parent_id != 0');
		$db->setQuery((string) $query);
		$categories = $db->loadObjectList();

		$options  = array();
		$options[] = JHTML::_(
			'select.option',
			'',
			JText::_('COM_IMMOS_SELECT_OPTION')
		);

		$options[] = JHTML::_(
			'select.option',
			1,
			JText::_('COM_HELLOWORLD_TOP_PARENT')
		);

		foreach ($categories as $key => $value)
		{
			$title = str_repeat('&mdash;', $value->level - 1) . $value->title;
			$options[] = JHTML::_(
				'select.option',
				$value->id,
				$title
			);
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
