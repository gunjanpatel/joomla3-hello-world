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
 * Categories View
 *
 * @since  0.0.1
 */
class HelloWorldViewCategories extends JViewLegacy
{
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		$this->items         = $this->get('Items');
		$this->pagination    = $this->get('Pagination');
		$this->state         = $this->get('State');
		$this->filterForm    = $this->get('FilterForm');

		// Set the tool-bar and number of found items
		$this->addToolBar();

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		// Load the category helper.
		$title = JText::_('COM_HELLOWORLD_MANAGER_CATEGORIES');
		$user = JFactory::getUser();
		$userId = $user->get('id');
		$canDo = null;

		// Get the results for each action.
		$extension  = JFactory::getApplication()->input->get('task', '', 'word');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 1em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>" . " " . $userId;
		}

		JToolBarHelper::title($title, 'category');

		if (JFactory::getUser()->authorise('core.create', 'com_helloworld'))
		{
			JToolBarHelper::addNew('category.add');
		}

		if (JFactory::getUser()->authorise('core.edit', 'com_helloworld'))
		{
			JToolBarHelper::editList('category.edit');
		}

		if (JFactory::getUser()->authorise('core.delete', 'com_helloworld'))
		{
			JToolBarHelper::deleteList('', 'categories.delete');
		}

		JToolbarHelper::publish('categories.publish', 'JTOOLBAR_PUBLISH', true);
		JToolbarHelper::unpublish('categories.unpublish', 'JTOOLBAR_UNPUBLISH', true);
		JToolbarHelper::archiveList('categories.archive');
		JToolBarHelper::trash('categories.trash');
		JToolbarHelper::checkin('categories.checkin');

		if (JFactory::getUser()->authorise('core.admin', 'com_helloworld'))
		{
			JToolBarHelper::preferences('com_helloworld');
		}

		JToolbarHelper::help('JHELP_COMPONENTS_TAGS_MANAGER');

			JToolbarHelper::custom('categories.rebuild', 'refresh.png', 'refresh_f2.png', 'JTOOLBAR_REBUILD', false);



	}
}
